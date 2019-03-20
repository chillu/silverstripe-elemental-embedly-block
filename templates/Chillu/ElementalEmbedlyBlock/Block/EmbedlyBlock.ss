<%-- See https://docs.embed.ly/v1.0/docs/platformjs --%>
<script>
  (function(w, d){
   var id='embedly-platform', n = 'script';
   if (!d.getElementById(id)){
     w.embedly = w.embedly || function() {(w.embedly.q = w.embedly.q || []).push(arguments);};
     var e = d.createElement(n); e.id = id; e.async=1;
     e.src = ('https:' === document.location.protocol ? 'https' : 'http') + '://cdn.embedly.com/widgets/platform.js';
     var s = d.getElementsByTagName(n)[0];
     s.parentNode.insertBefore(e, s);
   }
  })(window, document);
</script>

<a
    href="$EmbedURL"
    class="embedly-card"
    data-card-align="$Align"
    data-card-width="$WidthAttribute"
    data-card-key="$ApiKey"
>
    Embedly
</a>