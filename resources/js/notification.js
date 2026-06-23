import toastr from 'toastr';
import 'toastr/build/toastr.min.css';

export default function notify({
    type = 'success',
    message = '',
    title = '',
    timeOut = 3000
}) 
{
    toastr.options = {
        closeButton: true,
        progressBar: true,
        timeOut
    };
    toastr[type](message, title);
}