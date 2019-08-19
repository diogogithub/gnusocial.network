<!DOCTYPE html>
<html>

    <head>
        <link rel="shortcut icon" href="assets/ico/favicon.ico">
        <link rel="stylesheet" href="assets/css/layout.css">
        <link rel="stylesheet" href="https://code.cdn.mozilla.net/fonts/fira.css">

        <title>GNU social &mdash; a free software social networking platform</title>
        <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,width=device-width" />
        <style>
            #nodes {
              font-family: Helvetica, Arial, sans-serif;
              border-collapse: collapse;
              width: 100%;
            }

            #nodes td, #nodes th {
              border: 1px solid #ddd;
              padding: 8px;
            }

            #nodes tr:nth-child(even){background-color: #f2f2f2;}

            #nodes tr:hover {background-color: #ddd;}

            #nodes th {
              padding-top: 12px;
              padding-bottom: 12px;
              text-align: left;
              background-color: #A22430;
              color: white;
            }
        </style>
    </head>

    <body>
        <div class="header">
            <nav class="gnu-nav">
                <a href="https://gnu.org" class="gnu-logo"><img alt="GNU" src="assets/img/gnu-transparent.png" /></a>
                <a href="https://gnu.org/gnu/gnu.html">About GNU</a>
                <a href="https://gnu.org/philosophy/philosophy.html">Philosophy</a>
                <a href="https://gnu.org/licenses/licenses.html">Licenses</a>
                <a href="https://gnu.org/education/education.html">Education</a>
                <a href="https://gnu.org/software/software.html">Software</a>
                <a href="https://gnu.org/doc/doc.html">Documentation</a>
                <a href="https://gnu.org/help/help.html">Help GNU</a>
                <a class="join-fsf" href="https://www.fsf.org/associate/support_freedom">JOIN&nbsp;THE&nbsp;FSF</a>
            </nav>
        </div>

        <div class="page">
            <div class="intro-section">
                <div class="logo">
                    <a href="index.html"><img src="assets/img/logo.png" alt="GNU social"></a>
                </div>

                <h2>The
                    <a href="https://www.gnu.org/philosophy/free-sw.html">free/libre</a>
                    software social networking platform.</h2>

                <div class="download-buttons">
                    <a href="#join">Join us</a>
                    <a href="https://notabug.org/diogo/gnu-social/src/nightly/INSTALL.md">Install</a>
                </div>
            </div>

            <?php
            $query = urlencode('
            {
              nodes(platform: "gnusocial") {
                openSignups
                name
                host
                countryCode
              }
            }
            ');
            $query_result = json_decode(file_get_contents("https://the-federation.info/graphql?query={$query}"), true);
            $query_result = $query_result['data']['nodes'];
            // Filter out instances with closed signups
            $nodes = array_filter($query_result, function ($node) {
                return $node['openSignups'];
            });
            // garbage collect
            unset($query_result);
            ?>

            <div class="paragraph">
                <h2>Try GNU social</h2>
                <table id="nodes">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Country</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($nodes as $node): ?>
                            <tr>
                                <td>
                                    <a href="https://www.<?php echo $node['host']; ?>">
                                        <?php echo $node['name']; ?>
                                    </a>
                                </td>
                                <td>
                                    <?php echo $node['countryCode']; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <h2>Support the Project</h2>
            <div class="support">
                <div class="support-item">
                    <h3>Liberapay</h3>
                    <p><a href="https://liberapay.com/diogo/donate">Donate</a> to the project lead, Diogo Cordeiro, with
                        Liberapay</p>
                </div>

                <div class="support-item support-item-middle">
                    <h3>Merchandising</h3>
                    <p>Buy your own GNU social t-shirt at <a
                        href="https://hackersatporto.teemill.com/collection/gnu-social/">Hackers at Porto Clothing</a>
                    </p>
                </div>

                <div class="support-item">
                    <h3>Logos</h3>
                    <p><a href="assets/zip/logos.tar.gz">gs-logos.tar.gz</a> (14.2 kB)</p>
                </div>
            </div>

            <div class="fsf-banner">
                <div class="container">
                    <div class="left">
                        <a class="fsf-logo" href="http://www.fsf.org"><img src="assets/img/fsf.png" alt="Free Software Fundation"></a>
                        <div id="fssbox">
                            <p>Subscribe to our monthly newsletter, the <a href="http://www.fsf.org/fss">Free Software Supporter</a></p>
                            <form action="https://my.fsf.org/civicrm/profile/create?reset=1&amp;gid=31" method="post">
                                <div>
                                    <input name="postURL" type="hidden" value="">
                                    <input type="hidden" name="group[25]" value="1">
                                    <input name="cancelURL" type="hidden" value="https://crm.fsf.org/civicrm/profile?reset=1&amp;gid=31">
                                    <input name="_qf_default" type="hidden" value="Edit:cancel">
                                </div>
                                <p>
                                    <input type="text" id="frmEmail" name="email-Primary" size="18" maxlength="80"
                                           placeholder="email address" onfocus="this.value=''">
                                    <input type="submit" name="_qf_Edit_next" value="Sign up">
                                </p>
                            </form>
                        </div>
                    </div>
                    <div class="right">
                        <p>"Our mission is to preserve, protect and promote the freedom to use, study, copy, modify, and
                            redistribute computer software, and to defend the rights of Free Software users."</p>
                        <p id="join-fsf"><a href="https://www.fsf.org/associate/support_freedom">JOIN&nbsp;THE&nbsp;FSF</a></p>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>
