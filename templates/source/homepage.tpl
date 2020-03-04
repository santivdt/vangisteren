<section class="content">
  <div id="homepage-splash">
    {if $splash && $splash.parsed.variables.homepage_image != ""}
      <a href="/{$splash.post_name}" title="">
        <div id="homepage-splash-image" style="background-image: url(/images/{$splash.parsed.variables.homepage_image});">
        </div>
        <div id="homepage-splash-intro">
          <h3>{$splash.parsed.variables.intro_title}</h3>
          <p>{$splash.parsed.variables.intro_message}</p>
        </div>
      </a>
    {/if}
  </div>
</section>
<div id="overview-posts-container">
  <section class="content">
    {include file="overview.tpl" posts=$posts page="home"}
  </section>
</div>
{include file="quote.tpl" post=$splash}
