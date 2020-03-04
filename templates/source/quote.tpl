{if $post
  && true == array_key_exists('parsed', $post)
  && true == array_key_exists('variables', $post.parsed)
  && true == array_key_exists('quote', $post.parsed.variables)}
  <section class="dark">
   <blockquote>
    <a href="/{$post.post_name}" title="">
      {$post.parsed.variables.quote}
    </a>
  </blockquote>
 </section>
{/if}

