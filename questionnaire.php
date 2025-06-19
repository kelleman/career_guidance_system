<?php include('includes/header.php'); ?>
<div class="container">
    <div class="card p-4 mt-5">
        <h3 class="text-center mb-4 text-primary">💼 Career Questionnaire</h3>
        <form action="result.php" method="POST">
            <div class="mb-3">
                <label class="form-label"><strong>What are your interests?</strong></label>
                <select class="form-select" name="interest" required>
                    <option value="">-- Select --</option>
                    <option value="science">Science</option>
                    <option value="art">Art</option>
                    <option value="business">Business</option>
                    <option value="technology">Technology</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label"><strong>Best Subjects (select 2 or 3)</strong></label>
                <select name="best_subjects[]" class="form-select" multiple required>
                    <option value="Mathematics">Mathematics</option>
                    <option value="English">English Language</option>
                    <option value="Physics">Physics</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Biology">Biology</option>
                    <option value="Further Mathematics">Further Mathematics</option>
                    <option value="Agricultural Science">Agricultural Science</option>
                    <option value="Economics">Economics</option>
                    <option value="Commerce">Commerce</option>
                    <option value="Financial Accounting">Financial Accounting</option>
                    <option value="Geography">Geography</option>
                    <option value="Government">Government</option>
                    <option value="Literature in English">Literature in English</option>
                    <option value="Christian Religious Studies">CRS</option>
                    <option value="Islamic Religious Studies">IRS</option>
                    <option value="Civic Education">Civic Education</option>
                    <option value="Technical Drawing">Technical Drawing</option>
                    <option value="Computer Studies">Computer Studies</option>
                    <option value="History">History</option>
                    <option value="Home Economics">Home Economics</option>
                    <option value="Food and Nutrition">Food and Nutrition</option>
                    <option value="Business Studies">Business Studies</option>
                    <option value="French">French</option>
                    <option value="Yoruba">Yoruba</option>
                    <option value="Hausa">Hausa</option>
                    <option value="Igbo">Igbo</option>
                </select>
                <small class="text-muted">Use Ctrl (Windows) or Cmd (Mac) to select multiple</small>

            </div>

            <div class="mb-3">
                <label class="form-label"><strong>What is your dream career?</strong></label>
                <input type="text" name="goal" class="form-control" placeholder="e.g., doctor, lawyer, engineer" required>
            </div>

            <div class="mb-3">
                    <label class="form-label"><strong>Preferred Learning Style</strong></label>
                    <select name="learning_style" class="form-select" required>
                        <option value="">--Select--</option>
                        <option value="Practical">Practical / Hands-on</option>
                        <option value="Theoretical">Theoretical / Analytical</option>
                        <option value="Creative">Creative / Imaginative</option>
                        <option value="Social">Social / People-oriented</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label"><strong>Do you prefer working indoors or outdoors?</strong></label>
                    <select name="work_preference" class="form-select" required>
                        <option value="">--Select--</option>
                        <option value="Indoors">Indoors</option>
                        <option value="Outdoors">Outdoors</option>
                        <option value="Flexible">Flexible</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label"><strong>Do you like leading others?</strong></label>
                    <select name="leadership" class="form-select" required>
                        <option value="">--Select--</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                        <option value="Sometimes">Sometimes</option>
                    </select>
                </div>


            <div class="text-center">
                <button type="submit" class="btn btn-success px-4">Get Recommendation</button>
            </div>
        </form>
    </div>
</div>
<?php include('includes/footer.php'); ?>
