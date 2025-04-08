<?php /* Template Name: Project Intake */ ?>

<?php get_header(); ?>

<main id="main" class="site-main" role="main">

<section class="intro">
    <div class="content-container">
        <?php the_content(); ?>
    </div>
</section>

<section class="project-intake">
    <div class="content-container wpforms-container wpforms-container-full wpforms-render-modern">
        <form class="wpforms-validate wpforms-form wpforms-ajax-form" action="#" method="post">
            <!-- Personal and Business Information -->
            <fieldset class="wpforms-field-container">
                <legend>Personal Information</legend>
                <label>Name: <input type="text" name="name" required></label><br>
                <label>Address: <input type="text" name="address"></label><br>
                <label>City: <input type="text" name="city" required></label>
                <label>State: <input type="text" name="state" required></label>
                <label>Zip: <input type="text" name="zip" required></label><br>
                <label>Phone: <input type="tel" name="phone"></label><br>
                <label>Email: <input type="email" name="email" required></label>
            </fieldset>

            <!-- Production Company -->
            <fieldset class="wpforms-field-container">
                <legend>Production Company</legend>
                <label>Name: <input type="text" name="company_name" required></label><br>
                <label>Address: <input type="text" name="company_address" required></label><br>
                <label>City: <input type="text" name="company_city" required></label>
                <label>State: <input type="text" name="company_state" required></label>
                <label>Zip: <input type="text" name="company_zip" required></label><br>
                <label>Phone: <input type="tel" name="company_phone"></label><br>
                <label>Email: <input type="email" name="company_email" required></label>
            </fieldset>

            <!-- Project Information -->
            <fieldset class="wpforms-field-container">
                <legend>Project Information</legend>
                <label>Project Title: <input type="text" name="project_title" required></label><br>
                <label>Project Type:</label><br>
                <input type="checkbox" name="project_type" value="Movie Trailer"> Movie Trailer <br>
                <input type="checkbox" name="project_type" value="Short Film"> Short Film <br>
                <!-- <input type="checkbox" name="project_type" value="Teaser"> Teaser <br>
                <input type="checkbox" name="project_type" value="Social Media Promo"> Social Media Promo <br> -->
                <input type="checkbox" name="project_type" value="Other"> Other (please specify): <input type="text" name="project_type_other"><br>
                <label>Brief Description:</label><br>
                <textarea name="description" rows="4" cols="50"></textarea>
            </fieldset>

            <!-- Footage & Assets -->
            <fieldset class="wpforms-field-container">
                <legend>Footage & Assets Provided</legend>
                <label>Total Footage Duration (approx.):</label><br>
                <input type="checkbox" name="footage_duration" value="Under 30 minutes"> Under 30 minutes <br>
                <input type="checkbox" name="footage_duration" value="30 minutes – 1 hour"> 30 minutes – 1 hour <br>
                <input type="checkbox" name="footage_duration" value="1 – 2 hours"> 1 – 2 hours <br>
                <input type="checkbox" name="footage_duration" value="Over 2 hours"> Over 2 hours <br>
                <label>Footage Format & Resolution:</label><br>
                <input type="checkbox" name="footage_format" value="4K"> 4K <br>
                <input type="checkbox" name="footage_format" value="1080p"> 1080p <br>
                <input type="checkbox" name="footage_format" value="Other"> Other (please specify): <input type="text" name="footage_format_other"><br>
            </fieldset>

            <!-- Editing Preferences & Style -->
            <fieldset class="wpforms-field-container">
                <legend>Editing Preferences & Style</legend>
                <label>Reference Videos:</label><br>
                <textarea name="reference_videos" rows="3" cols="50"></textarea><br>
                <label>Pacing & Tone Preferences:</label><br>
                <input type="checkbox" name="pacing_tone" value="Fast-Paced"> Fast-Paced <br>
                <input type="checkbox" name="pacing_tone" value="Emotional"> Emotional <br>
                <input type="checkbox" name="pacing_tone" value="Suspenseful"> Suspenseful <br>
                <input type="checkbox" name="pacing_tone" value="Dramatic"> Dramatic <br>
            </fieldset>

            <!-- Project Scope & Timeline -->
            <fieldset class="wpforms-field-container">
                <legend>Project Scope & Timeline</legend>
                <label>Deadline:</label><br>
                <input type="checkbox" name="deadline" value="Standard Turnaround"> Standard Turnaround <br>
                <input type="checkbox" name="deadline" value="Rush Order"> Rush Order (Additional Fee Applies) <br>
                <label>Budget Range:</label><br>
                <input type="checkbox" name="budget" value="Under $500"> Under $500 <br>
                <input type="checkbox" name="budget" value="$500 – $1,000"> $500 – $1,000 <br>
                <input type="checkbox" name="budget" value="$1,000 – $3,000"> $1,000 – $3,000 <br>
                <input type="checkbox" name="budget" value="Over $3,000"> Over $3,000 <br>
            </fieldset>

            <!-- Legal & Licensing -->
            <fieldset class="wpforms-field-container">
                <legend>Legal & Licensing</legend>
                <label>Usage Rights & Distribution:</label><br>
                <input type="checkbox" name="usage_rights" value="Commercial Use"> Commercial Use <br>
                <input type="checkbox" name="usage_rights" value="Film Festival"> Film Festival <br>
                <input type="checkbox" name="usage_rights" value="YouTube/Social Media"> YouTube/Social Media <br>
                <input type="checkbox" name="usage_rights" value="Other"> Other (please specify): <input type="text" name="usage_rights_other"><br>
            </fieldset>

            <!-- Additional Notes -->
            <fieldset class="wpforms-field-container">
                <legend>Additional Notes</legend>
                <label>Additional Details:</label><br>
                <textarea name="additional_notes" rows="4" cols="50"></textarea>
            </fieldset>

            <button class="btn btn-primary wpforms-submit" type="submit" name="wpforms[submit]" data-alt-text="Sending..." data-submit-text="Submit" aria-live="assertive" value="wpforms-submit">Get me that quote!</button>
        </form>
    </div>
</section>

</main>

<?php get_footer(); ?>