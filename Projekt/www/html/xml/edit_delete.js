function deleteCharacter(index) {
    if (confirm('Are you sure you want to delete this character?')) {
        document.getElementById('deleteForm' + index).submit();
    }
}

function editCharacter(index) {
    var form = document.getElementById('editForm' + index);
    var inputs = form.querySelectorAll('input[type="text"], input[type="number"]');
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].disabled = false;
    }
    form.querySelector('button[type="submit"]').style.display = 'block';
}

