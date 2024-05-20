document.addEventListener("DOMContentLoaded", function() {
    console.log("edit_delete.js loaded");

    document.querySelectorAll("button[type='button']").forEach(function(button) {
        if (button.textContent.trim() === "Edit") {
            button.addEventListener("click", function() {
                var index = button.closest("form").querySelector("input[name='index']").value;
                console.log("Editing character:", index);
                var row = button.closest("tr");
                row.querySelectorAll('input[type="text"], input[type="number"]').forEach(function(input) {
                    input.disabled = false;
                });
                button.style.display = 'none';
                row.querySelector('button[type="submit"]').style.display = 'block';
            });
        }
        else if (button.textContent.trim() === "Delete") {
            button.addEventListener("click", function() {
                var index = button.closest("form").querySelector("input[name='index']").value;
                deleteCharacter(index);
            });
        }
    });
});

function deleteCharacter(index) {
    if (confirm('Are you sure you want to delete this character?')) {
        document.getElementById('deleteForm' + index).submit();
    }
}
