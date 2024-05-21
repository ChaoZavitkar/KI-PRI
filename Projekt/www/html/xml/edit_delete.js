document.addEventListener("DOMContentLoaded", function() {
    console.log("edit_delete.js loaded");

    document.querySelectorAll("button[type='button']").forEach(function(button) {
        if (button.textContent.trim() === "Edit") {
            button.addEventListener("click", function() {
                var form = button.closest("form");
                var indexInput = form.querySelector("input[name='index']");
                if (indexInput) {
                    var index = indexInput.value;
                    console.log("Editing character:", index);
                    form.querySelectorAll('input[type="text"].hidden-input').forEach(function(input) {
                        input.classList.remove('hidden-input'); // Show input fields for editing
                    });
                    button.style.display = 'none'; // Hide edit button
                    form.querySelector('button[type="submit"]').style.display = 'block'; // Show save button
                } else {
                    console.error("Index input field not found");
                }
            });
        } else if (button.textContent.trim() === "Delete") {
            button.addEventListener("click", function() {
                var form = button.closest("form");
                var indexInput = form.querySelector("input[name='index']");
                if (indexInput) {
                    var index = indexInput.value;
                    deleteCharacter(index);
                } else {
                    console.error("Index input field not found");
                }
            });
        }
    });
});

// Rest of the code remains the same

function deleteCharacter(index) {
    if (confirm('Are you sure you want to delete this character?')) {
        document.getElementById('deleteForm' + index).submit();
    }
}
