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
                    form.querySelectorAll('input[type="text"], input[type="number"]').forEach(function(input) {
                        input.style.display = 'block'; // Show input fields for editing
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

function deleteCharacter(index) {
    if (confirm('Are you sure you want to delete this character?')) {
        document.getElementById('deleteForm' + index).submit();
    }
}

// Add event listener for form submit
document.querySelectorAll("form").forEach(function(form) {
    form.addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Debugging: Log values before form submission
        var formData = new FormData(form);
        for (var [key, value] of formData.entries()) {
            console.log(key + ": " + value);
        }

        // Confirm submission for debugging
        if (confirm("Do you want to submit the form with these values?")) {
            // Now, submit the form
            fetch(form.action, {
                method: form.method,
                body: formData
            }).then(response => response.text())
              .then(data => {
                  console.log("Form submitted successfully.");
                  console.log("Response:", data);
                  window.location.href = "editChar.php"; // Redirect after successful submission
              }).catch(error => {
                  console.error("Error submitting form:", error);
              });
        }
    });
});
