<?php
function parseEML($emlContent) {
    // Replace EML tags with HTML tags
    $htmlContent = str_replace('<lesson>', '<div class="lesson">', $emlContent);
    $htmlContent = str_replace('</lesson>', '</div>', $htmlContent);
    $htmlContent = str_replace('<title>', '<h1>', $emlContent);
    $htmlContent = str_replace('</title>', '</h1>', $htmlContent);
    $htmlContent = str_replace('<content>', '<p>', $emlContent);
    $htmlContent = str_replace('</content>', '</p>', $emlContent);
    $htmlContent = str_replace('<quiz>', '<div class="quiz">', $emlContent);
    $htmlContent = str_replace('</quiz>', '</div>', $emlContent);
    $htmlContent = str_replace('<question>', '<div class="question">', $emlContent);
    $htmlContent = str_replace('</question>', '</div>', $emlContent);
    $htmlContent = str_replace('<text>', '<p>', $emlContent);
    $htmlContent = str_replace('</text>', '</p>', $emlContent);
    $htmlContent = str_replace('<option correct="true">', '<p class="correct">', $emlContent);
    $htmlContent = str_replace('<option correct="false">', '<p class="incorrect">', $emlContent);
    $htmlContent = str_replace('</option>', '</p>', $emlContent);

    // Return the parsed HTML content
    return $htmlContent;
}
?>
