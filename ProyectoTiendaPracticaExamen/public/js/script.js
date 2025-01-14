function submitForm($form) {
    document.getElementById($form).submit();
}

function selectAll(classToSelect) {
    Array.from(document.getElementsByClassName(classToSelect)).forEach(checkbox => {
        checkbox.checked = true;
    }); 
}

function unselectAll(classToSelect) {
    Array.from(document.getElementsByClassName(classToSelect)).forEach(checkbox => {
        checkbox.checked = false;
    }); 
}