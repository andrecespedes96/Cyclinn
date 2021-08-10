


<script>
!function(e,t,a,n,c,r)
{
  function s(t){
    e.console.log("[Guesty Embedded Widget]:",t)
  }
  var i,d,l,o,y,m,g,h,p,u;n&&(i=n,d=t.getElementsByTagName("head")[0],(l=t.createElement("link")).rel="stylesheet",
  l.type="text/css",l.href=i,l.media="all",d.appendChild(l)),o=function()
  {
    try{
      e[a].create(r).catch(function(e){s(e.message)})
    }
    catch(e){s(e.message)}
  },h=!1,y=c,m=function(){
    h||this.readyState&&"complete"!=this.readyState||(h=!0,o())},(g=t.createElement("script"))
    .type="text/javascript",g.src=y,g.async="true",g.onload=g.onreadystatechange=m,p=g,
    (u=t.getElementsByTagName("script")[0]).parentNode.insertBefore(p,u)}
    (window,document,"GuestySearchBarWidget","https://cyclinn.com.br/assets/search-bar-production.css",
    "https://cyclinn.com.br/assets/search-bar-production.js",
    {"siteUrl":"cyclinn.guestybookings.com"});
</script>
