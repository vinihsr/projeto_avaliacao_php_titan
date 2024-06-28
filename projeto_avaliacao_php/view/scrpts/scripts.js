function validateForm(formId, fieldIds) {
    var isValid = true;

    fieldIds.forEach(function(fieldId) {
        var field = document.getElementById(fieldId);
        if (field.value.trim() === "") {
            isValid = false;
            field.style.borderColor = "red";
        } else {
            field.style.borderColor = "";
        }
    });

    if (!isValid) {
        alert("Todos os campos devem ser preenchidos.");
    }

    return isValid;
}

// Função genérica para adicionar eventos
function addEvent(elementId, event, handler) {
    var element = document.getElementById(elementId);
    if (element) {
        element.addEventListener(event, handler);
    }
}
