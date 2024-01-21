<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logoQuality.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="Dashboard.css">
    <style>
        .container {
            display: flex;
        }

        .left {
            width: 20%;
            padding: 20px;
            background-color: #f5f5f5;
        }

        .user-info {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .user-avatar {
            margin-right: 10px;
        }

        .user-avatar img {
            width: 50px;
            height: 50px;
            border-radius: 25px;
        }

        .user-details p {
            margin: 0;
            font-weight: bold;
        }

        .navigation-links {
            margin-bottom: 20px;
        }

        .contents {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
       a{
        text-decoration: none;
        color: white;
       }
        .contents i {
            margin-right: 10px;
        }

        .contents a {
            text-decoration: none;
            color: #333;
        }

        .messages-section {
            border-top: 2px solid #ddd;
            padding-top: 20px;
        }

        .message-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .message-table th,
        .message-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .message-table th {
            background-color: #f2f2f2;
        }

        .message-actions {
            display: flex;
            gap: 5px;
        }

        .message-actions button {
            background-color: #4CAF50;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .right {
            flex: 1;
            padding: 20px;
        }
        a{
            text-decoration: none;
            color: white;
        }
        a >p{
            text-decoration: none;
            color: white;
        }
    </style>
    <title>Landlord</title>
</head>

<body>
    <div class="container">
        <div class="left">
            <div class="user-info">
                <div class="user-avatar">
                    <img src="images/comment.jpeg" alt="User Avatar">
                </div>
                <div class="user-details">
                    <p>Ami Paradis</p>
                    <p>pishimwe7@gmail.com</p>
                </div>
            </div>

            <div class="navigation-links">
                <div class="contents">
                    <i class="fa-solid fa-user"></i>
                    <a href="landlord.html">
                        <p>Profile</p>
                    </a>
                </div>
                <div class="contents">
                    <i class="fa-regular fa-pen-to-square"></i>
                    <a href="manage.html">
                        <p>Manage properties</p>
                    </a>
                </div>
                <div class="contents">
                    <i class="fa-solid fa-upload"></i>
                    <a href="listproperties.html">
                        <p>List Properties</p>
                    </a>
                </div>
                <div class="contents">
                    <i class="fa-solid fa-envelope"></i>
                    <a href="notifications.php">
                        <p>Notifications</p>
                    </a>
                </div>
                <div class="contents">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <p>Logout</p>
                </div>
            </div>
        </div>

        <div class="right">
            <div class="messages-section">
                <h3>Messages</h3>
                <!-- Display messages here -->
                <table class="message-table">
                    <thead>
                        <tr>
                            <th>Sender</th>
                            <th>Message</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                        <tr>
                            <td>Mucyo Ngango</td>
                            <td>I need yyo book this house atleast 5 years.</td>
                            <td class="message-actions">
                                <button>Reply</button>
                                <button>Delete</button>
                            </td>
                        </tr>
                        <tr>
                <td>Luis Alscene</td>
                <td>I need to book hthis house in 5 days of Lavilo</td>
                <td class="message-actions">
                    <button data-action="reply">Reply</button>
                    <button data-action="delete">Delete</button>
                </td>
           
   
                        <tbody>
                        <?php
                        // Include your database connection file
                        include "connector.php";

                        // Fetch messages from the database
                        $sql = "SELECT email, Fullnames, Comments FROM messages";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>' . $row['Fullnames'] . '</td>';
                                echo '<td>' . $row['Comments'] . '</td>';
                                echo '<td class="message-actions">';
                                echo '<button data-action="reply">Reply</button>';
                                echo '<button data-action="delete" onclick="confirmDelete(' . $row['email'] . ')">Delete</button>';
                                echo '</td>';
                                echo '</tr>';
                            }
                        } else {
                            echo '<tr><td colspan="3">No messages found.</td></tr>';
                        }

                        // Close the database connection
                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Get all delete buttons
            var deleteButtons = document.querySelectorAll('.message-actions button[data-action="delete"]');

            // Attach click event listener to each delete button
            deleteButtons.forEach(function (button) {
                button.addEventListener('click', function () {
                    // Find the parent row and remove it
                    var messageRow = this.closest('tr');
                    messageRow.remove();
                });
            });

            // You can similarly add functionality for the "Reply" button if needed
        });
    </script>
</body>

</html>
