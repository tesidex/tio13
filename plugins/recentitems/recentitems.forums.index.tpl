<!-- BEGIN: MAIN -->
    <h4 class="headingright">{PHP.L.blogster_recentforums}</h4>
    <table class="table table-striped">
    <!-- BEGIN: TOPICS_ROW -->
      <tr>
        <td class="centered" style="vertical-align: middle; width: 15%;">
          {FORUM_ROW_ICON}
        </td>
        <td>
          <h5><a href="{FORUM_ROW_URL}">{FORUM_ROW_TITLE}</a></h5>
          <p>{FORUM_ROW_PATH_SHORT}</p>
        </td>
        <td style="vertical-align: middle;">
          {FORUM_ROW_TIMEAGO} {PHP.L.blogster_ago}
        </td>
      </tr>
    <!-- END: TOPICS_ROW -->
    <!-- BEGIN: NO_TOPICS_FOUND -->
      <tr>
        <td class="centered" colspan="4">{PHP.L.recentitems_nonewposts}</td>
      </tr>
    <!-- END: NO_TOPICS_FOUND -->
    </table>
<!-- END: MAIN -->
