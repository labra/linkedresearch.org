<? $title = "Linked Open Research Cloud"; ?>
<? include 'top.php'; ?>
    <main>
      <article about="" typeof="schema:Article">
        <h1 property="schema:name"><?=$title;?></h1>

        <div datatype="rdf:HTML" id="content" property="schema:description">
          <dl id="document-published">
            <dt>Published</dt>
            <dd><time content="2017-08-26T00:00:00Z" datatype="xsd:dateTime" datetime="2017-08-26T00:00:00Z" property="schema:datePublished">2017-08-26</time></dd>
          </dl>

          <dl id="document-modified">
            <dt>Modified</dt>
            <dd><time content="2017-08-26T00:00:00Z" datatype="xsd:dateTime" datetime="2017-08-26T00:00:00Z" property="schema:dateModified">2017-08-26</time></dd>
          </dl>

          <dl id="document-inbox">
            <dt>Notifications Inbox</dt>
            <dd><a href="https://linkedresearch.org/inbox/linkedresearch.org/cloud/" rel="ldp:inbox">inbox/</a></dd>
          </dl>

          <section id="abstract">
            <h2>Abstract</h2>
            <div datatype="rdf:HTML" property="schema:abstract">
              <p>The <dfn id="lorc">Linked Open Research Cloud</dfn> (<abbr title="Linked Open Research Cloud">LORC</abbr>) is an initiative to increase the visibility of <cite>free culture</cite> resources about scholarly communication on the Web. It receives and serves notifications about scholarly activity, and generates a graph.</p>
            </div>
          </section>

          <section id="keywords">
            <h2>Keywords</h2>
            <div>
              <ul rel="schema:about">
                <li><a href="https://en.wikipedia.org/wiki/Linked_Data" resource="http://dbpedia.org/resource/Linked_Data">Linked Data</a></li>
                <li><a href="https://en.wikipedia.org/wiki/Scholarly_communication" resource="http://dbpedia.org/resource/Scholarly_communication">Scholarly communication</a></li>
                <li><a href="https://en.wikipedia.org/wiki/Semantic_publishing" resource="http://dbpedia.org/resource/Semantic_publishing">Semantic publishing</a></li>
                <li><a href="https://en.wikipedia.org/wiki/Social_web" resource="http://dbpedia.org/resource/Social_web">Social web</a></li>
              </ul>
            </div>
          </section>

          <section id="graph" rel="schema:hasPart" resource="#graph">
            <h2 propert="schema:name">Graph</h2>
            <div datatype="rdf:HTML" property="schema:description">
              <p>Let's <strong>make it so!</strong></p>

              <object>Super soon to appear here...</object>
            </div>
          </section>

          <section id="about" rel="schema:hasPart" resource="#about">
            <h2 property="schema:name">About</h2>
            <div datatype="rdf:HTML" property="schema:description">
              <p>This article has an inbox to receive <cite><a href="https://www.w3.org/TR/ldn/">Linked Data Notifications</a></cite> (<abbr title="Linked Data Notifications">LDN</abbr>) about scholarly activities, eg. publication of scholarly articles (regardless of the status of the document), Web annotations (like peer reviews, replies), semantic citations, call for contributions, observations, funding information etc. Practically anything along the lines of the Linked Research <a href="rfc#challenges">challenges</a>. The notifications refer to actual works which are expected to follow the <cite><a about="" href="https://www.w3.org/DesignIssues/LinkedData" rel="cito:givesSupportTo">Linked Data design principles</a></cite>. <strong>Only mentions of free and open full works and activities are welcome</strong> for inclusion in the graph. The notifications are used towards constructing the <q>cloud</q>.</p>

              <h3 id="why-notifications">Why notifications?</h3>
              <p>We do not need to create accounts nor should you be forced to just to notify the cloud. LORC will be dynamically autogenerated by client-side JavaScript. Notifications can are Linked Data resources, so they can be discovered and consumed by applications which comply with that stack of technologies.</p>

              <h3 id="what-are-notifications">What are notifications?</h3>
              <p>LDN notifications tend to be snippets of information about some object or activity. The graph is normally dynamically constructed (although your agent may cache it) so make sure that the important parts of what it refers to (like a peer review in response to an article) is both accessible and contains full content. We do not automatically verify whether an object contains the full article, but if it does not, and we find out, we will manually remove it, and go to great lengths to publicly shame 😉</p>

              <p id="notification-payload">A notification's payload can be sent in HTML+RDFa (human and machine-readable), JSON-LD (minimum requirement for LDN), or Turtle (widely considered to be human-readable in addition to being machine-readable). Besides whatever is announced in the notification (like something cited something) we recommend that they use the Creative Commons license and include the senders profile URI. Reminder that the license you use determines how it will be reused or remixed by consumers.</p>

              <p id="notification-access">Stored notifications can be discovered and accessed from the inbox (via <code>ldp:contains</code>). Each will have its own persistent URL.</p>

              <h3 id="how-to-send-notifications">How to send notifications?</h3>
              <p>A typical LDN <em>sender</em> discovers the inbox of a target resource, eg. this article, so that the inbox URL is not hardcoded in sender's application. However, sending notifications directly into this article's inbox (see the object of the <code>ldp:inbox</code> relation) is still welcome. Here are some examples using <cite>curl</cite>:</p>

              <figure class="listing" id="figure-ldn-research-article-rdfa" rel="schema:hasPart" resource="#figure-ldn-research-article-rdfa">
                <pre property="schema:description" resource="#figure-ldn-research-article-rdfa" typeof="fabio:Script"><code>curl -i -X POST -H'Content-Type: text/html' https://linkedresearch.org/inbox/linkedresearch.org/cloud/ \</code>
<code>--data-raw '&lt;!DOCTYPE html&gt;</code>
<code>&lt;html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"&gt;</code>
<code>  &lt;head&gt;</code>
<code>    &lt;title&gt;“Title of Research Article” is a reply of “Call for Linked Research”&lt;/title&gt;</code>
<code>    &lt;meta charset="utf-8" /&gt;</code>
<code>  &lt;/head&gt;</code>
<code>  &lt;body about="" prefix="as: https://www.w3.org/ns/activitystreams#" typeof="as:Announce"&gt;</code>
<code>    &lt;p&gt;&lt;cite&gt;&lt;a href="http://example.org/research-article"&gt;Title of Research Article&lt;/a&gt;&lt;/cite&gt; is a reply of &lt;a about="http://example.org/research-article" rel="http://rdfs.org/sioc/ns#reply_of" href="https://linkedresearch.org/calls"&gt;Call for Linked Research&lt;/a&gt;.&lt;/p&gt;</code>
<code>    &lt;p&gt;&lt;Announced by &lt;a href="http://csarven.ca/#i" rel="as:actor"&gt;Sarven&lt;/a&gt;&lt;/p&gt;</code>
<code>    &lt;p&gt;&lt;Using &lt;a href="https://creativecommons.org/licenses/by/4.0/" rel="schema:license"&gt;CC BY 4.0&lt;/a&gt; license&lt;/p&gt;</code>
<code>  &lt;/body&gt;</code>
<code>&lt;/html&gt;</code>
<code>'</code></pre>
                <figcaption property="schema:name">Example <a href="https://www.w3.org/TR/ldn/">Linked Data Notification</a> to announce the research article with <code>curl</code> in HTML+RDFa.</figcaption>
              </figure>


              <figure class="listing" id="figure-ldn-research-article-announce" rel="schema:hasPart" resource="#figure-ldn-research-article-announce">
                <pre property="schema:description" resource="#figure-ldn-research-article-announce" typeof="fabio:Script"><code>curl -i -X POST -H'Content-Type: text/turtle' https://linkedresearch.org/inbox/linkedresearch.org/cloud/ \</code>
<code>--data-raw '@prefix as: &lt;https://www.w3.org/ns/activitystreams#&gt; .</code>
<code>@prefix oa: &lt;http://www.w3.org/ns/oa#&gt; .</code>
<code>@prefix xsd: &lt;http://www.w3.org/2001/XMLSchema#&gt; .</code>
<code>@prefix schema: &lt;http://schema.org/&gt; .</code>
<code>&lt;&gt; a as:Announce ;</code>
<code>  schema:license &lt;https://creativecommons.org/licenses/by/4.0/&gt; ;</code>
<code>  as:actor &lt;http://csarven.ca/#i&gt; ;</code>
<code>  as:object &lt;http://example.org/research-article&gt; ;</code>
<code>  as:target &lt;https://linkedresearch.org/calls&gt; ;</code>
<code>  as:updated "2016-11-07T11:47:52.852Z"^^xsd:dateTime .</code>
<code>&lt;http://example.org/research-article&gt;</code>
<code>  a oa:Annotation ;</code>
<code>  oa:motivation oa:replying .</code>
<code>'</code></pre>
                <figcaption property="schema:name">Example <a href="https://www.w3.org/TR/ldn/">Linked Data Notification</a> to announce the research article (using the <a href="https:/www.w3.org/TR/annotation-vocab">Web Annotation vocabulary</a>) with <code>curl</code> in Turtle.</figcaption>
              </figure>

              <figure class="listing" id="figure-ldn-research-article-json-ld" rel="schema:hasPart" resource="#figure-ldn-research-article-json-ld">
                <pre property="schema:description" resource="#figure-ldn-research-article-json-ld" typeof="fabio:Script"><code>curl -i -X POST -H'Content-Type: application/ld+json' https://linkedresearch.org/inbox/linkedresearch.org/cloud/ \</code>
<code>--data-raw '{</code>
<code>  "@id":"http://example.org/research-article",</code>
<code>  "http://rdfs.org/sioc/ns#reply_of":</code>
<code>    { "@id": "https://linkedresearch.org/calls" }</code>
<code>}</code>
<code>'</code></pre>
                <figcaption property="schema:name">Example <a href="https://www.w3.org/TR/ldn/">Linked Data Notification</a> to announce the research article (using the <a href="http://rdfs.org/sioc/spec/">SIOC vocabulary</a>) with <code>curl</code> in JSON-LD.</figcaption>
              </figure>
t
              <p>Alternatively, there are applications that are capable of sending. There is a list of conforming <a href="https://linkedresearch.org/ldn/tests/summary#sender">LDN senders</a> which you can use.</p>

              <h3 id="faq">You have some questions, so here are some answers:</h3>

              <dl>
                <dt id="lod-cloud">What about the <cite><a href="http://lod-cloud.net/">LOD Cloud</a></cite>?</dt>
                <dd>LORC is only meant to put emphasis on a the scholarly domain with its own requirements. If the LOD Cloud wants to incorporate LORC, there are no constraints from this end.</dd>

                <dt id="related-work">What about the all those other related initiatives and attempts?</dt>
                <dd>What about them? What is their coverage and are they referring to accessible things? This is not strictly about citations or reference systems. LORC focuses on building the graph from the ground-level, ie. individuals, groups or labs taking the initiative to build the <q>Web We Want</q>. It is collecting datadumps. We are strictly not interested in <q>metadata</q> aggregates, cooperation with for-profits, or anything that is not initially meant for the Web with <em>universal access</em> in mind. If the original work and activities in full are not out there on the Web, they do not exist or in the <q>commons</q> as far as LORC is concerned.</dd>

                <dt id="data-license">What's the license on the graph and notifications?</dt>
                <dd>The graph is CC BY 4.0. Notifications have their own license - whatever the sender set it to be.</dd>

                <dt id="integrity-and-persistence">Notification integrity and persistence</dt>
                <dd>We promise not to alter the notification payload. We may remove notifications if it does not meet the criteria or if we are in a really bad mood.</dd>

                <dt id="success-or-fail">Will this succeed or fail?</dt>
                <dd>It depends on us as a community. Do <em>you</em> want it to succeed? Do <em>you</em> want to use it? What are <em>you</em> going to do for it?</dd>

                <dt id="funding">Who is funding this initiative?</dt>
                <dd>Funded by <a href="http://csarven.ca/#i">Sarven Capadisli</a> to run the server and conduct Web plumbing. If you have better ideas, <a href="#contact">mention it publicly</a>.</dd>

                <dt id="support">Who supports this initiative?</dt>
                <dd>The assumption here is that the Linked Research community implicitly supports this initiative.</dd>
                <dt id="contact">I have something else to ask or say</dt>
                <dd>You can say it in public <a href="https://gitter.im/linkedresearch/chat">chat</a> or raise an <a href="https://github.com/linkedresearch/linkedresearch.org/">issue</a>.</dd>
              </dl>
            </div>
          </section>

        </div>
      </article>
    </main>
<? include 'end.php'; ?>
