<?php
$json = '[
    {
        "title": "The Catcher in the Rye",
        "author": "J.D. Salinger",
        "publication_year": 1951,
        "category": "Fiction"
    },
    {
        "title": "To Kill a Mockingbird",
        "author": "Harper Lee",
        "publication_year": 1960,
        "category": "Fiction"
    },
    {
        "title": "1984",
        "author": "George Orwell",
        "publication_year": 1949,
        "category": "Dystopian"
    },
    {
        "title": "The Great Gatsby",
        "author": "F. Scott Fitzgerald",
        "publication_year": 1925,
        "category": "Fiction"
    },
    {
        "title": "Brave New World",
        "author": "Aldous Huxley",
        "publication_year": 1932,
        "category": "Dystopian"
    }
]';

$books = json_decode($json, true);

$booksByCategory = [];
foreach ($books as $book) {
    $booksByCategory[$book["category"]][] = $book;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Categories</title>
    <style>
        table {
            border: 1px solid black;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            padding: 5px;
        }

        th {
            padding: 10px;
        }
    </style>
</head>
<body>

<table>
    <tr>
        <?php foreach ($booksByCategory as $category => $categoryBooks): ?>
            <th><?= $category ?></th>
        <?php endforeach; ?>
    </tr>

    <?php $maxRowCount = max(array_map('count', $booksByCategory)); ?>
    <?php for ($i = 0; $i < $maxRowCount; $i++): ?>
        <tr>
            <?php foreach ($booksByCategory as $category => $categoryBooks): ?>
                <?php if (isset($categoryBooks[$i])): ?>
                    <?php $book = $categoryBooks[$i]; ?>
                    <td>
                        <b>Author:</b> <?= $book['author'] ?><br>
                        <b>Title:</b> <?= $book['title'] ?><br>
                        <b>Publication Year:</b> <?= $book['publication_year'] ?>
                    </td>
                <?php else: ?>
                    <td></td>
                <?php endif; ?>
            <?php endforeach; ?>
        </tr>
    <?php endfor; ?>
</table>

</body>
</html>
