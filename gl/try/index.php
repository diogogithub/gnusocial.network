<!DOCTYPE html>
<html lang="gl">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="../../favicon.ico">

        <title>GNU social &mdash; plataforma de comunicación social feita con software libre</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.0/normalize.css">
        <link rel="stylesheet" href="https://code.cdn.mozilla.net/fonts/fira.css">

        <link rel="stylesheet" href="../../assets/css/layout.css">
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

        <link rel="canonical" href="https://gnusocial.network/">
    </head>

    <body>
        <header>
            <nav class="gnu-nav">
                <a href="https://gnu.org" class="gnu-logo"><img alt="GNU" src="../../assets/img/gnu-transparent.png" /></a>
                <a href="https://gnu.org/gnu/gnu.html">Sobre GNU</a>
                <a href="https://gnu.org/philosophy/philosophy.html">Filosofía</a>
                <a href="https://gnu.org/licenses/licenses.html">Licenzas</a>
                <a href="https://gnu.org/education/education.html">Educación</a>
                <a href="https://gnu.org/software/software.html">Software</a>
                <a href="https://gnu.org/doc/doc.html">Documentación</a>
                <a href="https://gnu.org/help/help.html">Axuda a GNU</a>
                <a class="join-fsf" href="https://www.fsf.org/associate/support_freedom">ÚNETE&nbsp;A&nbsp;FSF</a>
            </nav>
        </header>


        <section id="intro-section">
            <h1>
                <a href="../index.html"><img src="../../assets/img/logo.png" alt="GNU social"></a>
            </h1>

             <h2>Rede social 
                <a href="https://www.gnu.org/philosophy/free-sw.html">libre</a>, plataforma de comunicación para persoas.
            </h2>

            <div class="cta">
                <a href="#join">Ven con nós!</a>
                <a href="https://notabug.org/diogo/gnu-social/src/nightly/INSTALL.md">Instalar</a>
            </div>
        </section>

        <section id="try-section">
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
            <h2>Proba GNU social</h2>
            <p>Ten en conta que os servidores de esta lista non están xestionados por nós, non somos responsables da súa xestión nin do seu contido. Móstranse aquí como un servizo a comunidade.</p>

            <h3>Servidores Públicos GNU social</h3>
            <table id="nodes">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>País</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($nodes as $node): ?>
                    <tr>
                        <td>
                            <a href="https://www.<?php echo $node['host']; ?>"><?php echo $node['name']; ?></a>
                        </td>
                        <td>
                            <?php echo $node['countryCode']; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <p><br>Esta tabla procede de <a href="https://the-federation.info/">the federation - a statistics hub</a>, se desexas
            aparecer nela, vai a https://the-federation.info/register/<yournode.tld>.
            Pasados uns segundos, deberías aparecer na lista.</p>
        </section>

        <section id="support-section">
            <h2>Axuda ao Proxecto</h2>
            <div class="col-narrow">
                <h3>Liberapay</h3>
                <p><a href="https://liberapay.com/diogo/donate">Doar</a> ao desenvolvedor director do proxecto, Diogo Cordeiro, en
                    Liberapay</p>
            </div>

            <div class="col-narrow">
                <h3>Tenda</h3>

                <p>Merca a túa camiseta de GNU social en <a
                    href="https://hackersatporto.teemill.com/collection/gnu-social/">Hackers at Porto Clothing</a>
                </p>
            </div>

            <div class="col-narrow">
                <h3>Logos</h3>
                <p><a href="../../assets/zip/logos.tar.gz">gs-logos.tar.gz</a> (14.2 kB)</p>
            </div>
        </section>

        <footer>
            <div class="fsf-banner">
                <div class="container">
                    <div class="left">
                        <a class="fsf-logo" href="http://www.fsf.org"><img src="../../assets/img/fsf.png" alt="Free Software Fundation"></a>
                        <div id="fssbox">
                            <p>Subscríbete ao boletín mensual, o <a href="http://www.fsf.org/fss">Free Software Supporter</a></p>
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
                        <p>"A nosa misión é conservar, protexer e promover a <strong>liberdade de utilizar, estudar, copiar,
                        modificar e redistribuír</strong> o software para computadoras, así como defender os dereitos dos usuarios do <strong>Software Libre</strong>."</p>
                        <p id="join-fsf"><a href="https://www.fsf.org/associate/support_freedom">ÚNETE&nbsp;A&nbsp;FSF</a></p>
                    </div>
                </div>
            </div>
            <div class="footer">
                <div class="container">
                    <div class="left">
                        <p>Deseñado por <a href="https://www.diogo.site/">Diogo Cordeiro</a> e Gonçalo Oliveira.</p>
                        <p>Copyright 2010-2019 <a href="https://fsf.org">Free Software Foundation</a>, Inc.<br></p>
                        <address>51 Franklin St, Fifth Floor, Boston, MA 02110, USA</address>
                    </div>
                    <div class="right">
                        <p>Mantido por <a href="https://dalme.net">DalmeGNU</a>.
                            Ségueme en GNU social: <a href="https://gnusocial.cc/dalme">@dalme</a>.</p>
                        <p>Este sitio web está baixo os termos da licenza 
                             <a href="https://creativecommons.org/licenses/by-sa/4.0">CC-BY-SA</a>.</p>
                        <!-- l10n , alphabetical order.
                            It may be better just put international language code, like "en".
                        -->
                        <p><a href="../../#">English</a> — <a href="../../es/">Español</a> — <a href="../../gl/">Galego</a> - <a href="../../pt/">Português</a></p>
                        <!-- en of l10n links -->
                    </div>
                </div>
            </div>
        </footer>

    </body>

</html>
