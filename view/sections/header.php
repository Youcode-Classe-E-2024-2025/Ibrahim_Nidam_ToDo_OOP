<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="a knaban app for taskflow enterprise" />
        <meta name="keywords" content="kanban,task manager, taskflow" />
        <meta name="author" content="Ibrahim Nidam" />
        <title>Task Flow || Kanban</title>
        <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="icon" href="assets/src/images/favicon/favicon-32x32.png" type="image/x-icon" />
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=chevron_left"
        />
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=dark_mode"
        />

        <link href="assets/src/css/tailwind/output.css" rel="stylesheet" />
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
        <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

        <style>
        .drag-over {
            background-color: rgba(0, 0, 0, 0.05) !important;
            border: 2px dashed #ccc !important;
            transition: all 0.2s ease-in-out;
        }

        .dragging {
            opacity: 0.6;
            transform: scale(1.02);
            cursor: grabbing !important;
        }

        .dragNdrop {
            transition: transform 0.2s ease-in-out;
        }

        .dragging-active .dragNdrop:not(.dragging) {
            transform: scale(0.98);
        }

        #todo-card-article,
        #doing-card-article,
        #review-card-article,
        #done-card-article {
            min-height: 200px;
            transition: background-color 0.3s ease, border 0.3s ease;
            padding: 8px;
            border: 2px solid transparent;
        }

    </style>

    </head>
    <body class="m-0 p-0 flex h-screen">
        <main class="flex-1 overflow-x-hidden">