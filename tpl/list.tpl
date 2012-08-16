<html>
  <head>
  </head>
  <body>
    <ul>
      {foreach from=$stream item=item}
      <li>
        name:{$item.user.name}<br>
        text:{$item.text}
      </li>
      {/foreach}
    </ul>
  </body>
</html>
