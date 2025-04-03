<?php

function measureDuplication($filePath) {
    // Read the content of the PHP file
    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    
    if ($lines === false) {
        echo "Failed to open the file.";
        return;
    }

    // Clean up the lines by trimming whitespace (removes leading/trailing spaces)
    $strippedLines = array_map('trim', $lines);

    // Count occurrences of each line
    $lineCount = array_count_values($strippedLines);

    // Filter out lines that appear only once
    $duplicates = array_filter($lineCount, function($count) {
        return $count > 1;
    });

    // Output duplication information
    if (!empty($duplicates)) {
        echo "Found " . count($duplicates) . " duplicate lines:\n";
        foreach ($duplicates as $line => $count) {
            echo "Line: '$line' appears $count times\n";
        }
    } else {
        echo "No duplicate lines found.\n";
    }
}

// Example usage
$filePath = 'your_php_file.php';  // Replace with the path to your PHP file
measureDuplication($filePath);

?>
