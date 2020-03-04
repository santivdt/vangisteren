<article lang="nl">
  <header id="article-header" style="background-image:url(/images/{$post.variables.homepage_image})">
  </header>
  <section>
    {$post.content_html}
  </section>
</article>
{if true == array_key_exists('related', $post) && 0 != count($post.related)}
  <section class="related">
    <div class="related-container">
      {foreach from=$post.related key=post_name item=related_post}
        <a class="related-post" href="/{$post_name}" title="">
          <div>
            <div style="background-image: url(/images/{$related_post.variables.homepage_image}"></div>
            <div class="related-post-content">
              <h4>{$related_post.variables.intro_title}</h4>
              <p>{$related_post.variables.intro_message}</p>
            </div>

          </div>
        </a>
      {/foreach}
    </div>
  </section>
{/if}
{include file="quote.tpl" post=$post}
