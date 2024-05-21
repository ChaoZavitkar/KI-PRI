<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Display current working directory
echo "Current working directory: " . getcwd() . "<br>";

// Test file creation
$testFilePath = 'test_write.txt';
file_put_contents($testFilePath, 'This is a test.');
if (file_exists($testFilePath)) {
    echo "Test file created successfully at " . realpath($testFilePath) . "<br>";
    // Uncomment the next line if you want to delete the test file after checking
    // unlink($testFilePath); // Clean up test file
} else {
    echo "Failed to create test file.<br>";
}

// Display directory listing
echo "<br>Directory listing:<br>";
$files = scandir(getcwd());
foreach ($files as $file) {
    echo $file . "<br>";
}
?>
