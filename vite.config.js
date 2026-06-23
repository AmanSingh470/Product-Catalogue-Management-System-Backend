import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",

                "resources/js/admin/category/searchbar.js",
                "resources/js/admin/company/searchbar.js",
                "resources/js/admin/company_contact_person/searchbar.js",
                "resources/js/admin/division/searchbar.js",
                "resources/js/admin/product/searchbar.js",
                "resources/js/admin/segment/searchbar.js",

                "resources/js/admin/layout/header.js",
                "resources/js/admin/layout/navbar.js",
                "resources/js/admin/layout/sidebar.js",

                "resources/js/admin/dashboard/index.js",
                "resources/js/admin/user/index.js",

                "resources/js/admin/category/create.js",
                "resources/js/admin/category/edit.js",
                "resources/js/admin/category/delete.js",

                "resources/js/admin/company/create.js",
                "resources/js/admin/company/edit.js",
                "resources/js/admin/company/delete.js",

                "resources/js/admin/company_contact_person/create.js",
                "resources/js/admin/company_contact_person/edit.js",
                "resources/js/admin/company_contact_person/delete.js",

                "resources/js/admin/division/create.js",
                "resources/js/admin/division/edit.js",
                "resources/js/admin/division/delete.js",

                "resources/js/admin/product/create.js",
                "resources/js/admin/product/edit.js",
                "resources/js/admin/product/delete.js",
                "resources/js/admin/product/product.js",
                'resources/js/admin/product/media.js',

                "resources/js/admin/segment/create.js",
                "resources/js/admin/segment/edit.js",
                "resources/js/admin/segment/delete.js",

                'resources/js/admin/layout/embla.js'
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        watch: {
            ignored: ["**/storage/framework/views/**"],
        },
    },
});
