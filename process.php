<?php
// List of common stop words to ignore
$stopWords = ["the", "and", "in", "of", "to", "a", "is", "it", "that", "with", "for", "on", "are", "as", "be", 
              "this", "by", "or", "at", "an", "was", "were", "but", "not", "have", "has", "had", "will", "would", 
              "can", "could", "which", "what", "when", "where", "who", "whom", "how", "why", "if", "then", "else", 
              "there", "their", "they", "them", "these", "those", "he", "she", "we", "you", "your", "i", "me", "my", 
              "mine", "our", "us"];

function tokenizeText($text) {
    $text = strtolower($text);
    $text = preg_replace('/[^\w\s]/', '', $text);
    $words = explode(' ', $text);
    $words = array_filter($words);
    return $words;
}

function calculateWordFrequencies($words, $stopWords) {
    $wordFrequencies = array();
    foreach ($words as $word) {
        // Ignore stop words
        if (!in_array($word, $stopWords)) {
            if (isset($wordFrequencies[$word])) {
                $wordFrequencies[$word]++;
            } else {
                $wordFrequencies[$word] = 1;
            }
        }
    }
    return $wordFrequencies;
}

function sortWordFrequencies($wordFrequencies, $sortOrder) {
    if ($sortOrder == "asc") {
        asort($wordFrequencies);
    } else {
        arsort($wordFrequencies);
    }
    return $wordFrequencies;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $text = $_POST["text"];
    $sortOrder = $_POST["sort"];
    $limit = intval($_POST["limit"]);

    $words = tokenizeText($text);

    $wordFrequencies = calculateWordFrequencies($words, $stopWords);

    $sortedWordFrequencies = sortWordFrequencies($wordFrequencies, $sortOrder);

    $sortedWordFrequencies = array_slice($sortedWordFrequencies, 0, $limit, true);

    echo "<h2>Word Frequencies</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Word</th><th>Frequency</th></tr>";
    foreach ($sortedWordFrequencies as $word => $frequency) {
        echo "<tr><td>$word</td><td>$frequency</td></tr>";
    }
    echo "</table>";
} else {
    echo "<p>Invalid request.</p>";
}
?>