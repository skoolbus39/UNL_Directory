<style type="text/css">
    blockquote {
         background: none repeat scroll 0pt 0pt rgb(240, 240, 240);
         margin: 15px 0pt;
         padding: 10px;
         width: auto;
    }

    blockquote > p {
         clear: none;
         margin: 0pt;
         padding: 0pt;
    }

    div.resource {
         border-bottom: #F0F0F0 5px solid;
         margin-bottom: 20px;
    }

    #maincontent div.resource > ul {
        padding-left:0;
    }

    div.resource > ul > li {
        list-style:none;
    }

</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/highlight.js/9.2.0/styles/solarized-dark.min.css"/>

<script type="text/javascript">
    require(['jquery', 'https://cdn.jsdelivr.net/highlight.js/9.2.0/highlight.min.js'], function($, hljs) {
        $('.resource pre.code code').each(function() {
            hljs.highlightBlock(this);
        })
    })
</script>


<div class="wdn-grid-set">
    <div class="bp3-wdn-col-three-fourths">
        <?php
        $resource = "UNL_Peoplefinder_Developers_" . $context->resource;
        $resource = new $resource;
        ?>
        <div class="resource">
            <h1 id="instance" class="sec_main"><?php echo $resource->title; ?> Resource</h1>
            <ul>
                <li>
                    <h2 id="instance-uri"><a href="#instance-uri">Resource URI</a></h2>
                    <blockquote>
                        <?php
                        $uri = $resource->uri;
                        if (substr($uri, 0, 2) == '//') {
                            $uri = 'http:' . $uri;
                        }
                        ?>
                        <p><?php echo $uri; ?></p>
                    </blockquote>
                </li>
                <li>
                    <h2 id="instance-properties"><a href="#instance-properties">Resource Properties</a></h2>
                    <table class="zentable neutral">
                    <thead><tr><th>Property</th><th>Description</th><th>JSON</th><th>XML</th></tr></thead>
                        <tbody>
                        <?php foreach ($resource->properties as $property): ?>
                            <tr>
                              <td><?php echo $property[0] ?></td>
                              <td><?php echo $property[1] ?></td>
                              <td><?php echo $property[2] ?></td>
                              <td><?php echo $property[3] ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </li>
                <li>
                    <h2 id="instance-get"><a href="#instance-get">HTTP GET</a></h2>
                    <p>Returns a representation of the resource, including the properties above.</p>
                </li>
                <li>
                    <h2 id="instance-get-example-1"><a href="#instance-get-example-1">Example</a></h2>
                    <ul class="wdn_tabs">
                    <?php
                    foreach ($resource->formats as $format) {
                        echo "<li><a href='#$format'>$format</a></li>";
                    }
                    ?>
                    </ul>
                    <div class="wdn_tabs_content">
                     <?php foreach ($resource->formats as $format): ?>
                        <?php
                         $url = UNL_Peoplefinder::addURLParams($resource->exampleURI, array('format' => $format));
                         if (substr($url, 0, 2) == '//') {
                             $url = 'http:' . $url;
                         }
                         ?>
                         <div id="<?php echo $format; ?>">
                              <pre><code>GET <?php echo $url; ?></code></pre>
                              <h3>Response</h3>
                              <?php
                              //Get the output.
                              if (!$result = file_get_contents($url)) {
                                  $result = "Error getting file contents.";
                              }
                              switch ($format) {
                                  case "json":
                                      $code = 'javascript';
                                      //Pretty print it
                                      $result = json_decode($result);
                                      $result = json_encode($result, JSON_PRETTY_PRINT);
                                      break;
                                  case "xml":
                                      $code = "xml";
                                      break;
                                  default:
                                      $code = "html";
                              }
                              ?>
                              <pre class="code">
                                  <code class="<?php echo $code; ?>"><?php echo htmlentities($result); ?></code>
                              </pre>
                         </div>
                     <?php endforeach; ?>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="bp3-wdn-col-one-fourth">
        <nav id='resources' aria-label="API Navigation" class="zenbox primary">
            <h2>Directory API</h2>
            <p>The following is a list of resources for Directory.</p>
            <ul>
                <?php foreach ($context->resources as $resource=>$name): ?>
                    <li><a href='?view=developers&resource=<?php echo $resource?>'><?php echo $name ?></a></li>
                <?php endforeach ?>
            </ul>
        </nav>
        <div class="zenbox neutral">
            <h2>Format Information</h2>
            <p>The following is a list of formats used in Directory.</p>
            <ul>
                <li><a href='http://www.json.org/'>JSON (JavaScript Object Notation)</a></li>
                <li><a href='http://en.wikipedia.org/wiki/XML'>XML (Extensible Markup Language)</a></li>
                <li>Partial - The un-themed main content area of the page.</li>
            </ul>
        </div>
    </div>
</div>
