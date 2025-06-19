<?php
include('includes/header.php');
include('includes/db.php');
include('rules/rule_engine.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get and sanitize form inputs
    $interest = trim($_POST['interest'] ?? '');
    $subjects = isset($_POST['best_subjects']) ? $_POST['best_subjects'] : [];
    $learningStyleInput = trim($_POST['learning_style'] ?? '');
    $workPreferenceInput = trim($_POST['work_preference'] ?? '');
    $leadershipInput = trim($_POST['leadership'] ?? '');

    // Subject normalization
    $subjectMap = [
        'Mathematics' => 'math',
        'English Language' => 'english',
        'Physics' => 'physics',
        'Chemistry' => 'chemistry',
        'Biology' => 'biology',
        'Further Mathematics' => 'further math',
        'Agricultural Science' => 'agriculture',
        'Economics' => 'economics',
        'Commerce' => 'commerce',
        'Financial Accounting' => 'accounting',
        'Geography' => 'geography',
        'Government' => 'government',
        'Literature in English' => 'literature',
        'Christian Religious Studies' => 'crs',
        'Islamic Religious Studies' => 'irs',
        'Civic Education' => 'civic',
        'Technical Drawing' => 'technical drawing',
        'Computer Studies' => 'computer science',
        'History' => 'history',
        'Home Economics' => 'home economics',
        'Food and Nutrition' => 'nutrition',
        'Business Studies' => 'business studies',
        'French' => 'french',
        'Yoruba' => 'yoruba',
        'Hausa' => 'hausa',
        'Igbo' => 'igbo'
    ];

    $subjectsNormalized = array_map(function($subject) use ($subjectMap) {
        return strtolower($subjectMap[$subject] ?? $subject);
    }, $subjects);

    // Learning style normalization
    $learningStyleMap = [
        'Practical' => 'visual',
        'Theoretical' => 'reading',
        'Creative' => 'creative',
        'Social' => 'social'
    ];
    $learningStyle = strtolower($learningStyleMap[$learningStyleInput] ?? $learningStyleInput);

    // Work preference normalization
    $workPrefMap = [
        'Indoors' => 'indoor',
        'Outdoors' => 'outdoor',
        'Flexible' => 'flexible'
    ];
    $workPreference = strtolower($workPrefMap[$workPreferenceInput] ?? $workPreferenceInput);

    // Leadership normalization
    $leadershipMap = [
        'Yes' => 'yes',
        'No' => 'no',
        'Sometimes' => 'sometimes'
    ];
    $leadership = strtolower($leadershipMap[$leadershipInput] ?? $leadershipInput);

    // Convert selected subjects to a string for saving/display
    $subjectsString = implode(", ", $subjects);

    // Get recommended careers/programmes
    $recommendations = suggestCareers($interest, $subjectsNormalized, $learningStyle, $workPreference, $leadership);
    $recommendedText = implode(", ", $recommendations);

    // Save to DB using PDO
    $stmt = $pdo->prepare("INSERT INTO responses (interest, best_subjects, learning_style, work_preference, leadership, suggested_programme) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$interest, $subjectsString, $learningStyle, $workPreference, $leadership, $recommendedText]);
}
?>

<div class="container my-5">
    <div class="card shadow-lg p-4">
        <h3 class="text-center text-primary mb-3">🎓 Recommendation Result</h3>
        <div class="mb-3"><strong>Area of Interest:</strong> <?= htmlspecialchars(ucfirst($interest)) ?></div>
        <div class="mb-3"><strong>Best Subjects:</strong> <?= htmlspecialchars($subjectsString) ?></div>
        <div class="mb-3"><strong>Learning Style:</strong> <?= htmlspecialchars(ucfirst($learningStyleInput)) ?></div>
        <div class="mb-3"><strong>Work Preference:</strong> <?= htmlspecialchars(ucfirst($workPreferenceInput)) ?></div>
        <div class="mb-3"><strong>Leadership Skills:</strong> <?= htmlspecialchars($leadershipInput) ?></div>
        <hr>
        <h5 class="text-success mt-3">✅ Recommended University Programmes:</h5>
        <div class="alert alert-info fs-5">
            <?= nl2br(htmlspecialchars($recommendedText)) ?>
        </div>
        <a href="index.php" class="btn btn-primary">🔁 Start Again</a>
    </div>
</div>

<?php include('includes/footer.php'); ?>
