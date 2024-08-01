<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMU Journal of Science</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #e9f5e9;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }
        .header {
            background-color: #2e7d32;
            color: #fff;
            padding: 20px;
            width: 100%;
            text-align: center;
        }
        .content {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-top: 20px;
            width: 80%;
        }
        .content h2 {
            margin-top: 0;
            color: #2e7d32;
        }
        .content p {
            color: #555;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card-title {
            font-size: 20px;
            margin-bottom: 15px;
        }
        .card-text {
            font-size: 18px;
        }
        .icon {
            font-size: 40px;
            margin-bottom: 15px;
        }
        .published-card {
            background-color: #f1f8f1;
            color: #2e7d32;
        }
        .unpublished-card {
            background-color: #f8d7da;
            color: #d32f2f;
        }
        .published-card .icon {
            color: #2e7d32;
        }
        .unpublished-card .icon {
            color: #d32f2f;
        }
        .section {
            margin-top: 40px;
        }
        .section h3 {
            color: #2e7d32;
        }
        .announcement {
            background-color: #f1f8f1;
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
            text-align: left;
        }
        .announcement h4 {
            margin: 0;
            color: #2e7d32;
        }
        .announcement p {
            margin: 5px 0 0;
        }
    </style>
</head>
<body>
    
<div class="header">
    <h1>CMU Journal of Science Dashboard</h1>
</div>

<div class="content">
    <div class="row">
        <div class="col-md-4">
            <div class="card published-card">
                <div class="card-body">
                    <i class="fas fa-check-circle icon"></i>
                    <h5 class="card-title">Published Volumes</h5>
                    <p class="card-text"><?php echo $publishedCount; ?></p> 
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card unpublished-card">
                <div class="card-body">
                    <i class="fas fa-times-circle icon"></i>
                    <h5 class="card-title">Unpublished Volumes</h5>
                    <p class="card-text"><?php echo $unpublishedCount; ?></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Additional Content -->
   

    <div class="section">
        <h3>Announcements</h3>
        <div class="announcement">
            <h4>Exciting Updates in Our Latest Software Release!</h4>
            <p>We're thrilled to announce the launch of our newest software version, packed with enhanced features, improved performance, and user-friendly interfaces. This update brings a range of innovative tools designed to streamline your workflow and boost productivity. Discover what's new and how these enhancements can benefit you today!</p>
        </div>
        <div class="announcement">
            <h4>Major Update: New Features & Improvements Now Live!</h4>
            <p>We’re excited to unveil our latest software update, featuring a host of new functionalities and performance upgrades. This release introduces streamlined workflows, enhanced security measures, and an intuitive interface designed to make your experience smoother and more efficient. Explore the new features and see how they can transform the way you work!</p>
        </div>
    </div>

    <div class="section">
        <h3>Upcoming Events</h3>
        <div class="announcement">
            <h4>Launch Webinar: Exploring the New Software Features</h4>
            <p>Join us for an exclusive webinar where we’ll dive deep into the latest software release. Our experts will showcase the new features, demonstrate their practical applications, and answer your questions in real-time. Whether you're a seasoned user or new to our platform, this session will help you make the most of the latest updates. Don’t miss this opportunity to enhance your skills and stay ahead of the curve!</p>
        </div>
        <div class="announcement">
            <h4>Hands-On Workshop: Mastering the Latest Software Update</h4>
            <p>Get hands-on experience with our new software update in this interactive workshop. You’ll work directly with our team to explore the new tools and features, solve real-world problems, and receive personalized support. This workshop is perfect for users looking to deepen their understanding and maximize their productivity with the new release. Spaces are limited, so be sure to secure your spot!</p>
        </div>
    </div>
</div>

</body>
</html>
