<?php function pintarEstilos(string $bgcolor, string $fgcolor) { ?>

    <style>

    body {
        background-color: <?= $bgcolor ?>;
        color: <?= $fgcolor ?>;
    }

    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #333;
    }

    li {
        float: left;
    }

    li a, li div {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    li a:hover, li div:hover {
        background-color: #111;
    }

    main, section{
        padding: 10px;
    }
</style>

<?php } ?>