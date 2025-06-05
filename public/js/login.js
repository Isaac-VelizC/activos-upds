document.addEventListener("DOMContentLoaded", function() {
    var institucionSelect = document.getElementById('institucion');
    var departamentoSelect = document.getElementById('departamento');

    institucionSelect.addEventListener('change', function() {
        var selectedInstitucion = institucionSelect.value;
        toggleDepartamentos(selectedInstitucion);
    });

    function toggleDepartamentos(selectedInstitucion) {
        departamentoSelect.innerHTML = '';
        if (selectedInstitucion === 'U') {
            addOption('PO', 'Potosí');
            addOption('SU', 'Sucre');
            addOption('TJ', 'Tarija');
            addOption('LP', 'La Paz');
            addOption('CB', 'Cochabamba');
            addOption('OR', 'Oruro');
            addOption('SC', 'Santa Cruz');
            addOption('PA', 'Pando');
            addOption('BE', 'Beni');
        } else if (selectedInstitucion === 'I' || selectedInstitucion === 'C') {
            addOption('TJ', 'Tarija');
            addOption('SC', 'Santa Cruz');
        } else if (selectedInstitucion === 'CL') {
            addOption('SC', 'Santa Cruz');
        }
    }

    function addOption(value, text) {
        var option = document.createElement('option');
        option.value = value;
        option.text = text;
        departamentoSelect.add(option);
    }

    toggleDepartamentos(institucionSelect.value);
});
