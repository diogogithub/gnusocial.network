<?php
    $query = urlencode("{nodes {id name version openSignups host}}");

    $nodes = json_decode(file_get_contents("https://the-federation.info/graphql?query={$query}"), true);
    # var_dump($nodes['data']['nodes']);
?>

<body>
    <table>
        <tr>
            <th>Name</th>
            <th>Version</th>
            <th>Host</th>
        </tr>
        <?php # var_dump($nodes['data']['nodes']);
        $all_nodes_info = $nodes['data']['nodes'];
        foreach ($all_nodes_info as $node_info): ?>
        <tr>
            <td><?php echo $node_info['name']; ?></td>
            <td><?php echo $node_info['version']; ?></td>
            <td><a href="https://www.<?php echo $node_info['host']; ?>"> <?php echo $node_info['host']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
