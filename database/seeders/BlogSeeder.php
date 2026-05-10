<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        // Create a demo admin user if not exists
        $admin = User::firstOrCreate(
            ['email' => 'admin@blogyaari.com'],
            [
                'name'     => 'BlogYaari Team',
                'username' => 'blogyaari',
                'password' => Hash::make('password'),
                'is_admin' => true,
            ]
        );

        // Create a second demo writer
        $writer = User::firstOrCreate(
            ['email' => 'writer@blogyaari.com'],
            [
                'name'     => 'Priya Sharma',
                'username' => 'priyasharma',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ]
        );

        $blogs = [
            // ── ADMIT CARD ────────────────────────────────────────────────
            [
                'title'             => 'UPSC Civil Services Admit Card 2024 Released — Download Now',
                'category'          => 'Admit Card',
                'short_description' => 'The Union Public Service Commission has officially released the Admit Card for the Civil Services (Preliminary) Examination 2024. Candidates can download it from the official UPSC portal.',
                'content'           => '<h2>UPSC Civil Services Admit Card 2024</h2><p>The Union Public Service Commission (UPSC) has released the Admit Card for the Civil Services (Preliminary) Examination 2024. All registered candidates can now download their admit cards from the official website <strong>upsc.gov.in</strong>.</p><h3>Key Details</h3><ul><li>Exam Date: May 26, 2024</li><li>Exam Mode: Offline (OMR based)</li><li>Admit Card Status: Available</li></ul><h3>Steps to Download Admit Card</h3><ol><li>Visit upsc.gov.in</li><li>Click on "e-Admit Card" link</li><li>Enter your Registration ID and Date of Birth</li><li>Download and print the admit card</li></ol><p>Candidates must carry the printed admit card along with a valid photo ID to the examination centre. No candidate will be allowed to enter without the admit card.</p>',
                'published_date'    => '2024-05-01',
                'upvotes'           => 47,
                'user_id'           => $admin->id,
            ],
            [
                'title'             => 'SSC CGL 2024 Tier-1 Admit Card: Direct Download Link Active',
                'category'          => 'Admit Card',
                'short_description' => 'Staff Selection Commission has activated the direct download link for SSC CGL Tier-1 Admit Card 2024. Over 35 lakh candidates had registered for this examination.',
                'content'           => '<h2>SSC CGL Tier-1 Admit Card 2024</h2><p>The Staff Selection Commission (SSC) has released the Admit Card for the Combined Graduate Level (CGL) Examination Tier-1 2024. Candidates who had successfully registered for the examination can download their admit cards from the official SSC website.</p><h3>Important Information</h3><ul><li>Organization: Staff Selection Commission</li><li>Post: Various Group B and Group C posts</li><li>Exam Level: National</li><li>Exam Window: 9 days</li></ul><h3>How to Download SSC CGL Admit Card</h3><ol><li>Go to ssc.nic.in or the regional SSC website</li><li>Click on "Admit Card / Call Letter" tab</li><li>Select CGL 2024 Tier-1 link</li><li>Enter your Registration Number and Date of Birth</li><li>Download and save the admit card PDF</li></ol><p>Make sure to check your exam city, date, and reporting time mentioned on the admit card carefully.</p>',
                'published_date'    => '2024-04-20',
                'upvotes'           => 82,
                'user_id'           => $admin->id,
            ],
            [
                'title'             => 'IBPS PO Prelims 2024 Admit Card — Hall Ticket Available',
                'category'          => 'Admit Card',
                'short_description' => 'Institute of Banking Personnel Selection has made the IBPS PO Prelims 2024 Admit Card available. The preliminary examination is scheduled across multiple dates in October 2024.',
                'content'           => '<h2>IBPS PO Prelims Admit Card 2024</h2><p>The Institute of Banking Personnel Selection (IBPS) has released the Call Letter (Admit Card) for the Probationary Officers Preliminary Examination 2024. Candidates can download their hall tickets from the official portal ibps.in.</p><h3>Exam Pattern</h3><ul><li>English Language: 30 Questions — 30 Marks</li><li>Quantitative Aptitude: 35 Questions — 35 Marks</li><li>Reasoning Ability: 35 Questions — 35 Marks</li><li>Total: 100 Questions — 100 Marks — 60 Minutes</li></ul><p>Candidates should note that there is negative marking of 0.25 marks for each wrong answer. The prelims is a qualifying round; marks will not be counted in the final merit list.</p>',
                'published_date'    => '2024-09-15',
                'upvotes'           => 61,
                'user_id'           => $writer->id,
            ],
            [
                'title'             => 'RRB NTPC 2024 CBT-1 Admit Card Released for All Regions',
                'category'          => 'Admit Card',
                'short_description' => 'Railway Recruitment Board has released the Computer Based Test Phase-1 Admit Card for NTPC 2024 recruitment. Candidates from all 21 RRB regions can download their admit cards.',
                'content'           => '<h2>RRB NTPC CBT-1 Admit Card 2024</h2><p>The Railway Recruitment Board (RRB) has officially released the Admit Card for the Non-Technical Popular Categories (NTPC) Computer Based Test Phase-1 for the year 2024. This recruitment covers various posts including Junior Clerk cum Typist, Accounts Clerk cum Typist, Junior Time Keeper, Trains Clerk, and Station Master.</p><h3>Vacancy Details</h3><ul><li>Graduate Level Posts: 8113 vacancies</li><li>Under Graduate Level Posts: 4894 vacancies</li><li>Total Vacancies: 11558</li></ul><p>Candidates must download their admit card from the official RRB website for their respective region. The link will be active 4 days before the exam date.</p>',
                'published_date'    => '2024-08-10',
                'upvotes'           => 95,
                'user_id'           => $admin->id,
            ],
            [
                'title'             => 'NEET UG 2024 Admit Card Download: NTA Official Portal Link',
                'category'          => 'Admit Card',
                'short_description' => 'National Testing Agency has released the NEET UG 2024 Admit Card. Over 23 lakh candidates registered for the medical entrance exam scheduled for May 5, 2024.',
                'content'           => '<h2>NEET UG 2024 Admit Card</h2><p>The National Testing Agency (NTA) has released the Admit Card for the National Eligibility cum Entrance Test Undergraduate (NEET UG) 2024. Registered candidates can access their admit card from the official NTA NEET website neet.ntaonline.in.</p><h3>Exam Day Instructions</h3><ul><li>Report at least 90 minutes before the exam</li><li>Carry printed admit card + original photo ID</li><li>No electronic devices allowed in exam hall</li><li>Bring your own blue/black ballpoint pen</li><li>Paste a recent passport photo on the admit card</li></ul><p>The exam will be conducted in pen-and-paper mode for 3 hours 20 minutes with 180 questions covering Physics, Chemistry, and Biology.</p>',
                'published_date'    => '2024-04-30',
                'upvotes'           => 134,
                'user_id'           => $writer->id,
            ],
            [
                'title'             => 'SBI Clerk 2024 Junior Associate Admit Card Out — Download Here',
                'category'          => 'Admit Card',
                'short_description' => 'State Bank of India has released the Admit Card for Junior Associates (Customer Support & Sales) Preliminary Examination 2024. Direct link available on the official SBI website.',
                'content'           => '<h2>SBI Clerk Prelims Admit Card 2024</h2><p>State Bank of India (SBI) has uploaded the Admit Card for the Junior Associates (Customer Support and Sales) Preliminary Examination 2024. This is one of the most awaited banking examinations in India with thousands of vacancies for various states.</p><h3>Selection Process</h3><ol><li>Preliminary Examination (Online)</li><li>Main Examination (Online)</li><li>Language Proficiency Test</li></ol><p>Candidates clearing the preliminary examination will be called for the Main examination. The marks of the preliminary examination are not added to the final merit list.</p>',
                'published_date'    => '2024-11-05',
                'upvotes'           => 73,
                'user_id'           => $admin->id,
            ],

            // ── RESULT ────────────────────────────────────────────────────
            [
                'title'             => 'UPSC Civil Services Final Result 2023 Declared — Aditya Srivastava AIR 1',
                'category'          => 'Result',
                'short_description' => 'UPSC has declared the Civil Services Examination 2023 Final Result. Aditya Srivastava from Lucknow has secured All India Rank 1. A total of 1016 candidates have been recommended for appointment.',
                'content'           => '<h2>UPSC CSE 2023 Final Result</h2><p>The Union Public Service Commission (UPSC) has officially declared the Civil Services Examination 2023 Final Result. This marks the culmination of a process that began with over 5 lakh candidates appearing for the preliminary examination.</p><h3>Toppers List</h3><ul><li>AIR 1: Aditya Srivastava</li><li>AIR 2: Animesh Pradhan</li><li>AIR 3: Donuru Ananya Reddy</li><li>AIR 4: Aishwarya Verma</li><li>AIR 5: Dyavnapally Namratha</li></ul><h3>Category-wise Recommended Candidates</h3><ul><li>General: 396</li><li>EWS: 100</li><li>OBC: 276</li><li>SC: 152</li><li>ST: 92</li></ul><p>All selected candidates will now go through the document verification process before being allocated to their respective services and cadres.</p>',
                'published_date'    => '2024-04-16',
                'upvotes'           => 210,
                'user_id'           => $admin->id,
            ],
            [
                'title'             => 'SSC CHSL Tier-1 Result 2024 Released — Cut Off Marks & Merit List',
                'category'          => 'Result',
                'short_description' => 'Staff Selection Commission has declared the SSC CHSL Tier-1 Result 2024 along with the cut-off marks. Qualified candidates will now appear for the Tier-2 examination.',
                'content'           => '<h2>SSC CHSL Tier-1 Result 2024</h2><p>The Staff Selection Commission (SSC) has declared the result of the Combined Higher Secondary Level (CHSL) Tier-1 Examination 2024. The result PDF containing roll numbers of shortlisted candidates has been uploaded on the official SSC website.</p><h3>Cut-off Marks (Tier-1)</h3><ul><li>General: 142.50</li><li>EWS: 132.00</li><li>OBC: 136.00</li><li>SC: 122.50</li><li>ST: 112.00</li><li>PwBD-1: 98.00</li></ul><p>Candidates who have qualified Tier-1 will be required to appear in the Tier-2 Examination which will include a Skill Test/Typing Test component. Keep checking the official website for Tier-2 exam dates.</p>',
                'published_date'    => '2024-07-08',
                'upvotes'           => 156,
                'user_id'           => $writer->id,
            ],
            [
                'title'             => 'CBSE Class 10 Result 2024 Announced — 93.60% Pass Percentage',
                'category'          => 'Result',
                'short_description' => 'CBSE has announced the Class 10 Board Examination Result 2024. Overall pass percentage stands at 93.60%. Girls outperform boys with a pass percentage of 94.75%.',
                'content'           => '<h2>CBSE Class 10 Board Result 2024</h2><p>The Central Board of Secondary Education (CBSE) has announced the Class 10 Board Examination Result 2024. Students can check their results on the official websites cbseresults.nic.in and results.cbse.nic.in.</p><h3>Key Highlights</h3><ul><li>Overall Pass Percentage: 93.60%</li><li>Girls Pass Percentage: 94.75%</li><li>Boys Pass Percentage: 92.71%</li><li>Total Students Appeared: 22,44,429</li><li>Total Students Passed: 20,99,740</li></ul><h3>How to Check Result</h3><ol><li>Go to cbseresults.nic.in</li><li>Click on "Class 10 Result 2024"</li><li>Enter Roll Number and Date of Birth</li><li>Submit and download result</li></ol>',
                'published_date'    => '2024-05-13',
                'upvotes'           => 189,
                'user_id'           => $admin->id,
            ],
            [
                'title'             => 'IBPS Clerk Mains Result 2024 Out — Provisional Allotment Soon',
                'category'          => 'Result',
                'short_description' => 'IBPS has declared the Clerk Mains Examination Result 2024. Selected candidates will be provisionally allotted to banks based on merit, vacancies, and preference.',
                'content'           => '<h2>IBPS Clerk Mains Result 2024</h2><p>The Institute of Banking Personnel Selection (IBPS) has officially declared the Mains Examination Result for the IBPS Clerk Recruitment 2024. Candidates who appeared in the online main examination can check their result status on ibps.in.</p><h3>What Happens After Result?</h3><p>Based on the merit list of Main examination scores and the vacancies notified by the participating organisations, candidates will be provisionally allotted to one of the banks. The provisional allotment will be conducted considering the preferences of candidates for banks and the availability of vacancies.</p><p>Selected candidates will have to complete a thorough document verification process at the allotted bank before joining.</p>',
                'published_date'    => '2024-04-01',
                'upvotes'           => 98,
                'user_id'           => $writer->id,
            ],
            [
                'title'             => 'NEET PG 2024 Result Declared — Download Rank Card Now',
                'category'          => 'Result',
                'short_description' => 'National Board of Examinations has declared the NEET PG 2024 Result. Candidates can download their rank card from the official NBE website. Counselling schedule will be released separately.',
                'content'           => '<h2>NEET PG 2024 Result</h2><p>The National Board of Examinations in Medical Sciences (NBEMS) has declared the result of the National Eligibility cum Entrance Test Postgraduate (NEET PG) 2024 Examination. The result has been uploaded on the official NBE website natboard.edu.in.</p><h3>NEET PG 2024 Highlights</h3><ul><li>Total Registered Candidates: 2,28,540</li><li>Total Appeared Candidates: 2,10,612</li><li>Total Qualified Candidates: 1,46,238</li></ul><p>The counselling for NEET PG seats will be conducted by the Medical Counselling Committee (MCC) for AIQ seats and by respective state counselling authorities for state quota seats.</p>',
                'published_date'    => '2024-08-20',
                'upvotes'           => 77,
                'user_id'           => $admin->id,
            ],
            [
                'title'             => 'JEE Main Session 2 Result 2024 — 56 Students Score 100 Percentile',
                'category'          => 'Result',
                'short_description' => 'NTA has declared the JEE Main Session 2 Result 2024. A record 56 students have achieved 100 percentile in this session. Results are available on jeemain.nta.nic.in.',
                'content'           => '<h2>JEE Main April Session Result 2024</h2><p>The National Testing Agency (NTA) has declared the Joint Entrance Examination (JEE) Main April/Session 2 Result 2024. The result has been released on the official NTA JEE website jeemain.nta.nic.in.</p><h3>Session 2 Key Statistics</h3><ul><li>Total Registered: 13,40,987</li><li>Total Appeared: 12,27,060</li><li>100 Percentilers: 56</li><li>States with Most Toppers: Rajasthan, Telangana, Andhra Pradesh</li></ul><p>The NTA Score (Percentile Score) has been calculated using the Normalization Procedure based on Multi-Session Papers. Candidates must qualify JEE Main to appear in JEE Advanced for IIT admissions.</p>',
                'published_date'    => '2024-05-25',
                'upvotes'           => 245,
                'user_id'           => $writer->id,
            ],

            // ── OTHER ─────────────────────────────────────────────────────
            [
                'title'             => 'RRB Group D 2024: 32,438 Vacancies Released — Full Notification',
                'category'          => 'Other',
                'short_description' => 'Railway Recruitment Board has released the official notification for Group D Level 1 posts in 7th CPC Pay Matrix with 32,438 vacancies. Online applications are open.',
                'content'           => '<h2>RRB Group D Recruitment 2024</h2><p>The Railway Recruitment Board (RRB) has released the official notification for the recruitment of Level 1 posts (Group D) under the 7th CPC Pay Matrix. This is a massive recruitment drive across all the Indian Railway zones and production units.</p><h3>Post Details</h3><ul><li>Track Maintainer Grade IV</li><li>Helper/Assistant in Mechanical, Electrical, Engineering, Signal & Telecommunication</li><li>Assistant Pointsman</li><li>Level 1 posts in other departments</li></ul><h3>Important Dates</h3><ul><li>Notification Date: Available Now</li><li>Application Start: Online</li><li>Education: Class 10th Pass + ITI</li><li>Age: 18-33 Years</li></ul>',
                'published_date'    => '2024-03-14',
                'upvotes'           => 312,
                'user_id'           => $admin->id,
            ],
            [
                'title'             => 'How to Prepare for UPSC in 6 Months — Comprehensive Study Plan',
                'category'          => 'Other',
                'short_description' => 'A structured 6-month study plan for UPSC Civil Services aspirants covering Prelims and Mains preparation strategy, recommended books, and time management tips.',
                'content'           => '<h2>6-Month UPSC Preparation Strategy</h2><p>Preparing for UPSC Civil Services in 6 months requires disciplined planning and consistent execution. While it is ambitious, many candidates have cracked the prelims in their first attempt with a focused approach.</p><h3>Month 1-2: Foundation Building</h3><ul><li>Complete NCERT books (6th to 12th) for History, Geography, Polity, Economics, and Science</li><li>Start reading The Hindu newspaper daily</li><li>Join a reliable test series</li></ul><h3>Month 3-4: Standard Books</h3><ul><li>Polity: Laxmikant</li><li>History: Bipin Chandra for Modern History</li><li>Geography: G.C. Leong for Physical Geography</li><li>Economy: Ramesh Singh</li></ul><h3>Month 5-6: Revision and Mock Tests</h3><ul><li>Attempt 2 full mock tests per week</li><li>Revise notes rigorously</li><li>Focus on current affairs of the last 12 months</li></ul>',
                'published_date'    => '2024-02-18',
                'upvotes'           => 428,
                'user_id'           => $writer->id,
            ],
            [
                'title'             => 'Best Books for SSC CGL 2024 Preparation — Subject-wise List',
                'category'          => 'Other',
                'short_description' => 'A curated list of the best books for SSC CGL 2024 preparation covering Quantitative Aptitude, English, General Intelligence, and General Awareness sections.',
                'content'           => '<h2>Best Books for SSC CGL 2024</h2><p>Choosing the right study material is half the battle won in competitive exam preparation. Here is a subject-wise list of the most recommended books for SSC CGL 2024.</p><h3>Quantitative Aptitude</h3><ul><li>Quantitative Aptitude by R.S. Aggarwal</li><li>Fast Track Arithmetic by Rajesh Verma</li><li>Magical Book on Quicker Maths by M. Tyra</li></ul><h3>English Language</h3><ul><li>Objective General English by S.P. Bakshi</li><li>Word Power Made Easy by Norman Lewis</li><li>Plinth to Paramount by Neetu Singh</li></ul><h3>General Intelligence & Reasoning</h3><ul><li>A Modern Approach to Verbal & Non-Verbal Reasoning by R.S. Aggarwal</li><li>Analytical Reasoning by M.K. Pandey</li></ul><h3>General Awareness</h3><ul><li>Lucent General Knowledge</li><li>Monthly Current Affairs magazines (Pratiyogita Darpan or Competition Master)</li></ul>',
                'published_date'    => '2024-01-22',
                'upvotes'           => 367,
                'user_id'           => $admin->id,
            ],
            [
                'title'             => 'Government Job Calendar 2024 — All Major Exam Dates at a Glance',
                'category'          => 'Other',
                'short_description' => 'Complete government job exam calendar for 2024 covering UPSC, SSC, RRB, IBPS, State PCS, and other major competitive examinations with important dates.',
                'content'           => '<h2>Govt Job Exam Calendar 2024</h2><p>Planning your preparation requires knowing all the exam dates well in advance. Here is a consolidated calendar of major government exams scheduled in 2024.</p><h3>Q1 (Jan–Mar)</h3><ul><li>SSC GD Constable CBT: January</li><li>IBPS SO Result: January</li><li>RBI Grade B Notification: February</li></ul><h3>Q2 (Apr–Jun)</h3><ul><li>UPSC CSE Prelims: May 26</li><li>NEET UG: May 5</li><li>JEE Advanced: May 26</li><li>SSC CHSL Tier-1: June–July</li></ul><h3>Q3 (Jul–Sep)</h3><ul><li>IBPS PO Notification: July</li><li>SSC CGL Tier-1: July–August</li><li>NEET PG: September</li></ul><h3>Q4 (Oct–Dec)</h3><ul><li>IBPS PO Prelims: October</li><li>SBI Clerk Mains: November</li><li>UPSC CDS Notification: December</li></ul>',
                'published_date'    => '2024-01-05',
                'upvotes'           => 519,
                'user_id'           => $writer->id,
            ],
            [
                'title'             => 'How to Fill OMR Sheet Correctly — Tips to Avoid Disqualification',
                'category'          => 'Other',
                'short_description' => 'Common mistakes candidates make while filling OMR answer sheets and how to avoid them. Follow these tips to ensure your responses are correctly captured.',
                'content'           => '<h2>OMR Sheet Filling Guide</h2><p>The OMR (Optical Mark Recognition) sheet is the answer sheet used in most government competitive examinations. A small mistake in filling the OMR can lead to disqualification or loss of marks. Here is a comprehensive guide.</p><h3>Before You Start</h3><ul><li>Read all instructions on the OMR sheet carefully</li><li>Use only a Blue or Black ballpoint pen (unless HB pencil is specified)</li><li>Check that your roll number and form number on the OMR match your admit card</li></ul><h3>While Filling Answers</h3><ul><li>Fill circles completely and darkly — partial filling may not be read</li><li>Do not use any tick marks or crosses</li><li>If you change an answer, do not attempt to erase — it damages the sheet</li><li>Cross-check your question booklet serial with your OMR series</li></ul><h3>Common Mistakes to Avoid</h3><ul><li>Leaving Roll Number column blank</li><li>Not filling the correct Set/Series code</li><li>Writing answers outside the provided bubbles</li><li>Smudging the sheet</li></ul>',
                'published_date'    => '2024-06-12',
                'upvotes'           => 203,
                'user_id'           => $admin->id,
            ],
            [
                'title'             => 'Top 10 Government Jobs After 12th Pass in India 2024',
                'category'          => 'Other',
                'short_description' => 'Explore the best government job opportunities available for 12th pass candidates in India 2024. Find posts with good salary, job security, and career growth.',
                'content'           => '<h2>Best Government Jobs After 12th Pass</h2><p>Completing Class 12 opens up several excellent government job opportunities in India. Here are the top 10 positions you can target.</p><h3>1. SSC CHSL (LDC / DEO)</h3><p>SSC Combined Higher Secondary Level exam recruits Lower Division Clerks, Data Entry Operators, and Postal Assistants. Salary: ₹19,900 – ₹63,200 per month.</p><h3>2. RRB Group D</h3><p>Railway Group D posts are available for candidates with Class 10 + ITI. One of the largest government recruitments with great job security.</p><h3>3. Indian Army Soldier</h3><p>Various soldier posts in the Indian Army are open for Class 10 and 12 pass candidates. Excellent salary, allowances, and pension benefits.</p><h3>4. CISF / BSF / CRPF Constable</h3><p>Central Armed Police Forces recruit constables for Class 12 pass candidates with physical fitness requirements.</p><h3>5. Postal Department MTS / Postman</h3><p>India Post recruits Multi-Tasking Staff and Postmen — good entry-level government job with stability.</p>',
                'published_date'    => '2024-03-30',
                'upvotes'           => 641,
                'user_id'           => $writer->id,
            ],
            [
                'title'             => 'State Bank of India Recruitment 2024 — 14,191 Junior Associate Posts',
                'category'          => 'Other',
                'short_description' => 'SBI has released a bumper recruitment notification for 14,191 Junior Associate (Clerk) vacancies across all circles. Graduates can apply online before the deadline.',
                'content'           => '<h2>SBI Junior Associate Recruitment 2024</h2><p>State Bank of India (SBI) has released one of the biggest banking recruitment notifications of 2024 with 14,191 vacancies for Junior Associates (Customer Support and Sales) posts across various circles.</p><h3>Vacancy Breakup (Major States)</h3><ul><li>UP: 2300</li><li>Maharashtra: 1850</li><li>Bihar: 1200</li><li>Rajasthan: 980</li><li>West Bengal: 875</li></ul><h3>Eligibility</h3><ul><li>Education: Graduation in any discipline</li><li>Age: 20–28 years (relaxation as per rules)</li><li>Language: Proficiency in local language mandatory</li></ul><h3>Salary</h3><p>Basic Pay: ₹17,900/- per month with DA, HRA and other allowances. Total CTC approximately ₹26,000–₹29,000 per month at the time of joining.</p>',
                'published_date'    => '2024-11-01',
                'upvotes'           => 487,
                'user_id'           => $admin->id,
            ],
            [
                'title'             => 'CTET December 2024 Notification Out — Apply for 3 Lakh Teaching Posts',
                'category'          => 'Other',
                'short_description' => 'CBSE has released the CTET December 2024 Notification. A valid CTET score is mandatory for Central Government Teaching posts. Paper 1 and Paper 2 registrations are now open.',
                'content'           => '<h2>CTET December 2024</h2><p>The Central Board of Secondary Education (CBSE) has released the notification for the Central Teacher Eligibility Test (CTET) December 2024. CTET is conducted to certify eligibility for teachers in Central Government schools including KVS, NVS, and Army Schools.</p><h3>Papers Available</h3><ul><li>Paper 1: For Primary Teachers (Class I–V)</li><li>Paper 2: For Upper Primary Teachers (Class VI–VIII)</li></ul><h3>CTET Syllabus Overview</h3><ul><li>Child Development and Pedagogy</li><li>Language I (Compulsory)</li><li>Language II (Compulsory)</li><li>Mathematics and/or Environmental Studies (Paper 1)</li><li>Subject-specific sections (Paper 2)</li></ul><p>CTET qualification is valid for a lifetime after the 2021 amendment. Qualified candidates can apply for teaching positions in central government schools across India.</p>',
                'published_date'    => '2024-09-25',
                'upvotes'           => 299,
                'user_id'           => $writer->id,
            ],
            [
                'title'             => 'NDA 2 2024 Admit Card Released — Download Before October Exam',
                'category'          => 'Admit Card',
                'short_description' => 'UPSC has released the NDA and NA Examination II 2024 Admit Card. Candidates selected will join the National Defence Academy and Naval Academy. Download from upsc.gov.in.',
                'content'           => '<h2>NDA 2 Admit Card 2024</h2><p>The Union Public Service Commission (UPSC) has released the Admit Card for the National Defence Academy and Naval Academy (NDA & NA) Examination (II) 2024. The examination is a gateway to join the Indian Army, Navy, and Air Force wings of the NDA.</p><h3>NDA Exam Pattern</h3><ul><li>Mathematics: 300 marks (120 questions)</li><li>General Ability Test: 600 marks (150 questions)</li><li>Total: 900 marks</li><li>Duration: 2.5 hours per paper</li></ul><h3>After Written Exam</h3><p>Candidates who qualify the written examination will be called for SSB (Services Selection Board) interview. The SSB is a 5-day personality and intelligence assessment conducted by the three armed forces.</p>',
                'published_date'    => '2024-08-28',
                'upvotes'           => 118,
                'user_id'           => $admin->id,
            ],
            [
                'title'             => 'GATE 2025 Admit Card Release Date and Download Process',
                'category'          => 'Admit Card',
                'short_description' => 'IIT Roorkee has announced the release date for GATE 2025 Admit Card. Over 14 lakh candidates have registered for the examination across 30 papers.',
                'content'           => '<h2>GATE 2025 Admit Card</h2><p>The Indian Institute of Technology (IIT) Roorkee, the organizing institute for GATE 2025, has announced that the Admit Cards will be available for download from the GOAPS portal. GATE 2025 is scheduled to be conducted in multiple sessions in February 2025.</p><h3>GATE 2025 Key Dates</h3><ul><li>Admit Card Release: January 2025</li><li>Exam Date: February 1, 2, 15, 16, 2025</li><li>Result Declaration: March 19, 2025</li><li>Score Card Download: March 2025</li></ul><p>GATE scores are used for admissions to M.Tech/M.S. programs in IITs, NITs, and other institutions. PSUs like ONGC, BHEL, NTPC, and IOCL also use GATE scores for recruitment of engineers.</p>',
                'published_date'    => '2025-01-08',
                'upvotes'           => 167,
                'user_id'           => $writer->id,
            ],
        ];

        foreach ($blogs as $data) {
            Blog::create($data);
        }

        $this->command->info('✅ Created ' . count($blogs) . ' demo blog posts!');
    }
}