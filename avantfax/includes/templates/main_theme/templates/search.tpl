<?xml version="1.0"?>
<OpenSearchDescription xmlns="http://a9.com/-/spec/opensearch/1.1/"
						xmlns:moz="http://www.mozilla.org/2006/browser/search/">
<ShortName>AvantFAX Archive</ShortName>
<Description>AvantFAX Archive search</Description>
<InputEncoding>utf-8</InputEncoding>
<Image height="16" width="16" type="image/x-icon">{$server}favicon.ico</Image>
<Url type="text/html" method="GET" template="{$server}archive.php?opensearch&amp;kw={literal}{searchTerms}{/literal}"></Url>
</OpenSearchDescription>