<?php
namespace App\Services\Admin;

use App\Models\Category;
use App\Models\Company;
use App\Models\CompanyContactPerson;
use App\Models\Division;
use App\Models\Product;
use App\Models\Segment;
use App\Models\ProductMedia;
use Illuminate\Support\Collection as SupportCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductService
{
    public function getProductStats(): array
    {
        return [
            'totalProducts'   => Product::count(),
            'ideaCount'       => Product::where('status', 1)->count(),
            'advanceCount'    => Product::where('status', 2)->count(),
            'serialCount'     => Product::where('status', 3)->count(),
            'productionCount' => Product::where('status', 4)->count(),
        ];
    }

    public function getProducts(): SupportCollection
    {
        $products = Product::with([
            'category:id,name',
            'segment:id,name',
            'division:id,name',
            'company:id,name',
            'companyContactPerson:id,name',

            'productMedia' => function ($query) {
                $query->where('media_type', 'image')
                    ->select('id', 'product_id', 'media_url')
                    ->limit(1);
            },
        ])
            ->select([
                'id',
                'title',
                'description',
                'category_id',
                'segment_id',
                'division_id',
                'company_id',
                'contact_person_id',
                'status',
                'updated_at',
            ])
            ->get()
            ->makeHidden([
                'category_id',
                'segment_id',
                'division_id',
                'company_id',
                'contact_person_id',
            ]);

        $products = $products->map(function ($product) {
            return [
                'id'                     => $product->id,
                'title'                  => $product->title,
                'description'            => $product->description,
                'category'               => $product->category,
                'segment'                => $product->segment,
                'division'               => $product->division,
                'company'                => $product->company,
                'company_contact_person' => $product->companyContactPerson,
                'status'                 => $product->status,
                'thumbnail'              => $product->productMedia->first()?->media_url,
                'updated_at'             => $product->updated_at->format('d/m/Y, g:i A'),
            ];
        });
        return $products;
    }

    public function getFilters()
    {
        $category = Category::select('id', 'name')->get();
        $segment  = Segment::select('id', 'name')->get();
        $division = Division::select('id', 'name')->get();
        $filters  = [
            'categories' => $category,
            'segments'   => $segment,
            'divisions'  => $division,
        ];
        return $filters;
    }

    public function createProductWithMedia(array $data, array $mediaFiles = []): Product
    {
        DB::beginTransaction();

        try {

            $product = Product::create(
                collect($data)
                    ->except([
                        'media',
                        'main_advantages',
                        'key_facts',
                        'intellectual_properties',
                        'applications',
                    ])
                    ->toArray()
            );

            $folderName = $product->id . '_' . Str::slug($product->title);

            Storage::disk('public')->makeDirectory(
                "media/product/{$folderName}/image"
            );

            Storage::disk('public')->makeDirectory(
                "media/product/{$folderName}/video"
            );

            Storage::disk('public')->makeDirectory(
                "media/product/{$folderName}/file"
            );

            $imageCount = 1;
            $videoCount = 1;
            $fileCount  = 1;

            foreach ($mediaFiles as $file) {

                $mime      = $file->getMimeType();
                $extension = strtolower(
                    $file->getClientOriginalExtension()
                );

                if (str_starts_with($mime, 'image/')) {

                    $type = 'image';

                    $fileName = sprintf(
                        '%d_image_%02d.%s',
                        $product->id,
                        $imageCount++,
                        $extension
                    );

                } elseif (str_starts_with($mime, 'video/')) {

                    $type = 'video';

                    $fileName = sprintf(
                        '%d_video_%02d.%s',
                        $product->id,
                        $videoCount++,
                        $extension
                    );

                } else {

                    $type = 'file';

                    $fileName = sprintf(
                        '%d_file_%02d.%s',
                        $product->id,
                        $fileCount++,
                        $extension
                    );
                }

                $path = $file->storeAs(
                    "media/product/{$folderName}/{$type}",
                    $fileName,
                    'public'
                );

                // Save entry in product_media table
                $product->productMedia()->create([
                    'media_type' => $type,
                    'media_url'  => $path,
                ]);
            }

            // Main Advantages
            if (! empty($data['main_advantages'])) {

                $product->mainAdvantage()->createMany(
                    collect($data['main_advantages'])
                        ->filter()
                        ->map(fn($item) => [
                            'description' => $item,
                        ])
                        ->values()
                        ->toArray()
                );
            }

            // Key Facts
            if (! empty($data['key_facts'])) {

                $product->keyFact()->createMany(
                    collect($data['key_facts'])
                        ->filter()
                        ->map(fn($item) => [
                            'description' => $item,
                        ])
                        ->values()
                        ->toArray()
                );
            }

            // Intellectual Properties
            if (! empty($data['intellectual_properties'])) {

                $product->intellectualProperty()->createMany(
                    collect($data['intellectual_properties'])
                        ->filter()
                        ->map(fn($item) => [
                            'description' => $item,
                        ])
                        ->values()
                        ->toArray()
                );
            }

            // Applications
            if (! empty($data['applications'])) {

                $product->application()->createMany(
                    collect($data['applications'])
                        ->filter()
                        ->map(fn($item) => [
                            'description' => $item,
                        ])
                        ->values()
                        ->toArray()
                );
            }

            DB::commit();

            return $product;

        } catch (\Throwable $e) {

            DB::rollBack();

            if (isset($folderName)) {

                Storage::disk('public')->deleteDirectory(
                    "media/product/{$folderName}"
                );
            }

            throw $e;
        }
    }

    public function getCompanies(): SupportCollection
    {
        return Company::select('id', 'name')
            ->get()
            ->map(function ($company) {
                return [
                    'id'   => $company->id,
                    'name' => $company->name,
                ];
            });
    }

    public function getContactPersons(): SupportCollection
    {
        return CompanyContactPerson::select('id', 'name')
            ->get()
            ->map(function ($person) {
                return [
                    'id'   => $person->id,
                    'name' => $person->name,
                ];
            });
    }
    public function getProductDetails(int $id): Product
    {
        return Product::with([
            'category:id,name',
            'segment:id,name',
            'division:id,name',
            'company:id,name',
            'companyContactPerson:id,name',
            'mainAdvantage:id,product_id,description',
            'keyFact:id,product_id,description',
            'intellectualProperty:id,product_id,description',
            'application:id,product_id,description',
            'productMedia:id,product_id,media_type,media_url',
        ])->findOrFail($id)
            ->makeHidden([
                'category_id',
                'segment_id',
                'division_id',
                'company_id',
                'contact_person_id',
            ]);
    }

    public function getCategories(): SupportCollection
    {
        return Category::select('id', 'name')
            ->get()
            ->map(function ($category) {
                return [
                    'id'   => $category->id,
                    'name' => $category->name,
                ];
            });
    }

    public function getSegments(): SupportCollection
    {
        return Segment::select('id', 'name')
            ->get()
            ->map(function ($segment) {
                return [
                    'id'   => $segment->id,
                    'name' => $segment->name,
                ];
            });
    }

    public function getDivisions(): SupportCollection
    {
        return Division::select('id', 'name', 'description')
            ->get()
            ->map(function ($division) {
                return [
                    'id'          => $division->id,
                    'name'        => $division->name,
                    'description' => $division->description,
                ];
            });
    }
    public function getProductMedia($id)
    {
        return ProductMedia::select(
            'id',
            'product_id',
            'media_type',
            'media_url'
        )
        ->where('product_id', $id)
        ->get();
    }
}
