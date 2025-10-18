class Alerts {
    static confirmDelete(form) {
        if (typeof Swal === 'undefined') {
            alert('¿Estás seguro de eliminar este registro?');
            form.submit();
            return;
        }
        Swal.fire({
            title: '¿Estás seguro?',
            text: 'Esta acción eliminará el registro de forma permanente.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    }
}

window.Alerts = Alerts;
