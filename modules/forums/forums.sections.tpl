<!-- BEGIN: MAIN -->
    <h2>{FORUMS_SECTIONS_PAGETITLE}</h2>
<!-- BEGIN: FORUMS_SECTIONS -->
    <table class="table table-striped">
      <thead>
          <th class="width10 hidden-phone">&nbsp;</td>
          <th class="width30">
            <a href="{PHP|cot_url('forums','c=fold#top')}" rel="nofollow">{PHP.L.forums_foldall}</a><span class="spaced">/</span><a href="{PHP|cot_url('forums','c=unfold#top')}" rel="nofollow">{PHP.L.forums_unfoldall}</a>
          </td>
          <th class="width30">{PHP.L.Lastpost}</td>
          <th class="width10">{PHP.L.forums_topics}</td>
          <th class="width10">{PHP.L.forums_posts}</td>
          <th class="width10 hidden-phone">{PHP.L.Activity}</td>
      </thead>
<!-- BEGIN: CAT -->
      <thead id="{FORUMS_SECTIONS_ROW_CAT}" class="forumsection">
        <tr>
          <th colspan="6">
            <a href="{FORUMS_SECTIONS_ROW_SECTIONSURL}" onclick="return toggleblock('blk_{FORUMS_SECTIONS_ROW_CAT}')">{FORUMS_SECTIONS_ROW_TITLE}</a>
          </th>
        </tr>
      </thead>
      <tbody id="blk_{FORUMS_SECTIONS_ROW_CAT}"<!-- IF {FORUMS_SECTIONS_ROW_FOLD} --> style="display:none;"<!-- ENDIF -->>
<!-- BEGIN: SECTION -->
        <tr>
          <td class="centered hidden-phone" style="vertical-align: middle;">
            {FORUMS_SECTIONS_ROW_ICON}
          </td>
          <td class="vmiddle">
            <h4 class="forumsh4"><a href="{FORUMS_SECTIONS_ROW_URL}">{FORUMS_SECTIONS_ROW_TITLE}</a></h4>
            <!-- IF {FORUMS_SECTIONS_ROW_DESC} -->
            <p class="small">{FORUMS_SECTIONS_ROW_DESC}</p>
            <!-- ENDIF -->
            <ul class="unstyled">
<!-- BEGIN: SUBSECTION -->
              <li>{PHP.R.forums_icon_subforum} <a href="{FORUMS_SECTIONS_ROW_URL}">{FORUMS_SECTIONS_ROW_TITLE}</a></li>
<!-- END: SUBSECTION -->
            </ul>
          </td>
          <td class="vmiddle">
            <!-- IF {FORUMS_SECTIONS_ROW_LASTPOST} -->
            {FORUMS_SECTIONS_ROW_LASTPOST}<br />
            {FORUMS_SECTIONS_ROW_LASTPOSTDATE} {FORUMS_SECTIONS_ROW_LASTPOSTER}
            <!-- ELSE -->
            <span class="muted">{PHP.L.blogster_noposts}</span>
            <!-- ENDIF -->
          </td>
          <td class="vmiddle">{FORUMS_SECTIONS_ROW_TOPICCOUNT}</td>
          <td class="vmiddle">{FORUMS_SECTIONS_ROW_POSTCOUNT}</td>
          <td class="vmiddle hidden-phone">{FORUMS_SECTIONS_ROW_ACTIVITY}</td>
        </tr>
<!-- END: SECTION -->
      </tbody>
    <!-- END: CAT -->
    </table>
<!-- END: FORUMS_SECTIONS -->
    <hr />
    <ul class="inline centered">
      <li><a href="{PHP|cot_url('plug','e=search&amp;tab=frm')}" class="btn">{PHP.L.forums_searchinforums}</a></li>
      <li><a href="{PHP|cot_url('forums','n=markall')}" rel="nofollow" class="btn">{PHP.L.forums_markasread}</a></li>
    </ul>
    <h4>{PHP.L.Tags}</h4>
    <div class="well">
      {FORUMS_SECTIONS_TAG_CLOUD}
    </div>
<!-- END: MAIN -->