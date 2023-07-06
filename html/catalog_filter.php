<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Rules.css" />
    <link rel="shortcut icon" href="../src/icons8-book-50.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/catalogfilter.css" />
    <script src="https://kit.fontawesome.com/7bcd40cb83.js" crossorigin="anonymous"></script>
    <title>Catalog Admin</title>
</head>

<body>
    <main>
        <?php
        require_once("../html/aside_admin.php");
        ?>
        <div id="content">

            <h4>Welcome</h4>
            <div class="content_table">
                <div class="content_tittle">
                    <img src="../src/img/data.png" alt="" />
                    <h6>Catalogs/ Catelog Items</h6>
                </div>
                <div class="content_description">
                    <div class="content_description_text">
                        <p>
                            Catalog Items
                        </p>
                        <a>
                            Manage your library Catalogs here.
                        </a>
                    </div>
                    <div class="content_description_search">
                        <div class="content_items">
                            <select name="menu" class="content_items_menu">
                                <option>Default</option>
                                <option>id</option>
                                <option>Title</option>
                                <option>Accession No</option>
                                <option>Call no</option>
                                <option>ISBN</option>
                                <option>ISSN</option>
                                <option>Author</option>
                                <option>Publisher</option>
                                <option>Category</option>
                                <option>Tags</option>
                                <option>Subject</option>
                                <option>Abstract</option>
                                <option>description</option>

                            </select>
                            <input type="text" name="buscar" class="content_items_search">
                            <input type="submit" value="Search" class="content_items_button_search">
                        </div>

                    </div>
                    <input type="submit" value="ADD" class="content_items_button_add">
                </div>
                <div class="flex-element">
                    <input class="btn" type="button" value="Smart add">
                    <input class="btn" type="button" value="Manual add">
                    <input class="btn" type="button" value="Import items">
                    <input class="btn" type="button" value="Authors">
                    <input class="btn" type="button" value="Publisher">
                    <input class="btn" type="button" value="Refresh">

                </div>
                <div class="table">
                    <table>
                        <tr>
                            <th> ID</th>
                            <th>Title </th>
                            <th>Type </th>
                            <th>Authors </th>
                            <th>Publisher </th>
                            <th>Calls No </th>
                            <th>Copies </th>
                            <th>Actions </th>

                        </tr>
                        <tr>
                            <td>12345678</td>
                            <td>Ema (Collins Classics)</td>
                            <td>Books </td>
                            <td>Austen,Jane</td>
                            <td>HarperCollins Publisher</td>
                            <td>5325242424249242424243236</td>
                            <td>
                                <div class="copies">
                                    <a>7/8</a>
                                </div>
                            </td>
                            <td>
                                <div class="flex-element">

                                    <div class="actions">
                                        <button><img src="../src/img/eye-svgrepo-com.png"></button>
                                    </div>
                                    <div class="actions">
                                        <button><img src="../src/img/documents-svgrepo-com.png"></button>
                                    </div>
                                </div>


                            </td>

                        </tr>
                    </table>

                </div>



            </div>


        </div>
    </main>
</body>

</html>