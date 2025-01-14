function submitForm($form) {
    document.getElementById($form).submit();
}

function selectAll() {
    Array.from(document.getElementsByClassName('selectClient')).forEach(checkbox => {
        checkbox.checked = true;
    }); 
}

function unselectAll() {
    Array.from(document.getElementsByClassName('selectClient')).forEach(checkbox => {
        checkbox.checked = false;
    }); 
}