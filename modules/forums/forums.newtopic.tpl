<!-- BEGIN: MAIN -->
    <h2>{FORUMS_NEWTOPIC_PAGETITLE}</h2>
    {FILE "{PHP.cfg.themes_dir}/{PHP.cfg.defaulttheme}/warnings.tpl"}
    <form action="{FORUMS_NEWTOPIC_SEND}" method="post" name="newtopic">
      <table class="table">
        <tr>
          <td class="width20">{PHP.L.Title}:</td>
          <td class="width80">{FORUMS_NEWTOPIC_TITLE}</td>
        </tr>
        <tr>
          <td>{PHP.L.Description}:</td>
          <td>{FORUMS_NEWTOPIC_DESC}</td>
        </tr>
<!-- BEGIN: PRIVATE -->
        <tr>
          <td>{PHP.L.forums_privatetopic1}:</td>
          <td>
            {FORUMS_NEWTOPIC_ISPRIVATE}
            <span class="muted">({PHP.L.forums_privatetopic2})</span>
          </td>
        </tr>
<!-- END: PRIVATE -->
        <tr>
          <td colspan="2">{FORUMS_NEWTOPIC_TEXT}</td>
        </tr>
<!-- BEGIN: POLL -->
        <tr>
          <td>{PHP.L.poll}:</td>
          <td>
            <script type="text/javascript" src="{PHP.cfg.modules_dir}/polls/js/polls.js"></script>
            <script type="text/javascript">
              var ansMax = {PHP.cfg.polls.max_options_polls};
            </script>
            {EDIT_POLL_IDFIELD}
            {EDIT_POLL_TEXT}
          </td>
        </tr>
        <tr>
          <td>{PHP.L.Options}:</td>
          <td>
<!-- BEGIN: OPTIONS -->
            <div class="polloptiondiv">
              {EDIT_POLL_OPTION_TEXT}
              <input name="deloption" value="x" type="button" class="deloption" style="display:none;" />
            </div>
<!-- END: OPTIONS -->
            <input id="addoption" name="addoption" value="{PHP.L.Add}" type="button" class="btn" style="display:none;" /></td>
        </tr>
        <tr>
          <td></td>
          <td>
            {EDIT_POLL_MULTIPLE}
          </td>
        </tr>
<!-- END: POLL -->
<!-- BEGIN: FORUMS_NEWTOPIC_TAGS -->
        <tr>
          <td>{PHP.L.Tags}:</td>
          <td>{FORUMS_NEWTOPIC_FORM_TAGS} ({FORUMS_NEWTOPIC_TOP_TAGS_HINT})</td>
        </tr>
<!-- END: FORUMS_NEWTOPIC_TAGS -->
        <tr>
          <td></td>
          <td><button type="submit" class="btn btn-primary">{PHP.L.Submit}</button></td>
        </tr>
      </table>
    </form>
<!-- END: MAIN -->