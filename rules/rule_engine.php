<?php
function suggestCareers($interest, $subjects, $learningStyle, $workPreference, $leadership) {
    $suggestions = [];

    // Normalize inputs
    $subjects = array_map('strtolower', $subjects);
    $interest = strtolower($interest);
    $learningStyle = strtolower($learningStyle);
    $workPreference = strtolower($workPreference);
    $leadership = strtolower($leadership);

    // Science & Health paths
    if (in_array('biology', $subjects) && $learningStyle === 'visual' && $workPreference === 'team') {
        $suggestions[] = "Medicine and Surgery";
        $suggestions[] = "Nursing";
    }

    if (in_array('chemistry', $subjects) && in_array('physics', $subjects)) {
        $suggestions[] = "Pharmacy";
        $suggestions[] = "Medical Laboratory Science";
    }

    // Engineering & Tech
    if (in_array('math', $subjects) && in_array('physics', $subjects)) {
        $suggestions[] = "Mechanical Engineering";
        $suggestions[] = "Electrical Engineering";
    }

    if (in_array('math', $subjects) && in_array('computer science', $subjects)) {
        $suggestions[] = "Computer Science";
        $suggestions[] = "Software Engineering";
    }

    // Business
    if (in_array('commerce', $subjects) && in_array('economics', $subjects)) {
        $suggestions[] = "Accounting";
        $suggestions[] = "Business Administration";
        $suggestions[] = "Banking and Finance";
    }

    // Arts
    if (in_array('literature', $subjects) && $learningStyle === 'reading') {
        $suggestions[] = "Mass Communication";
        $suggestions[] = "English Language";
        $suggestions[] = "Theatre Arts";
    }

    // Leadership traits — only if interest or subjects match
    if ($leadership === 'yes') {
        if ($interest === 'art' || $interest === 'social science' ||
            in_array('government', $subjects) || in_array('crs', $subjects) || in_array('civic education', $subjects)) {
            $suggestions[] = "Political Science";
            $suggestions[] = "Law";
            $suggestions[] = "Public Administration";
        }
    }

    // Default suggestion if nothing matches
    if (empty($suggestions)) {
        $suggestions[] = "General Studies or Interdisciplinary Programmes – More data needed.";
    }

    // Return unique suggestions
    return array_unique($suggestions);
}
?>
