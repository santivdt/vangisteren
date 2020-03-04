<ul id="overview-posts">
  {foreach from=$posts item=post}
    {if $page == "home"} 
      {if false == array_key_exists('homepage', $post) or $post.homepage != "y"}
        {continue}
      {/if}
    {elseif $page == "overview"}
      {if false == array_key_exists('overview', $post) or $post.overview != "y"}
        {continue}
      {/if}
    {/if}
    <li>
      <a href="/{$post.post_name}">
        <div class="overview-post-image" style="background-image:url(/images/{$post.parsed.variables.homepage_image})">
          <div class="overview-post-gradient">
          </div>
          <h3>{$post.parsed.variables.intro_title}</h3>
        </div>
        <div class="overview-post-intro">
          <p>{$post.parsed.variables.intro_message}</p>
        </div>
      </a>
    </li>
  {/foreach}
</ul>
