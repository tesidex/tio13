<!-- BEGIN: MAIN -->

      {FILE "{PHP.cfg.themes_dir}/{PHP.cfg.defaulttheme}/warnings.tpl"}
<!-- BEGIN: COMMENTS_FORM_EDIT -->
      <form id="comments" name="comments" action="{COMMENTS_FORM_POST}" method="post">
        <table class="table table-striped">
          <tr>
            <td class="width20"><b>{COMMENTS_POSTER_TITLE}:</b></td>
            <td class="width80">{COMMENTS_POSTER}</td>
          </tr>
          <tr>
            <td><b>{COMMENTS_DATE_TITLE}:</b></td>
            <td>{COMMENTS_DATE}</td>
          </tr>
          <tr>
            <td colspan="2">
              {COMMENTS_FORM_TEXT}
              <!-- IF {COMMENTS_FORM_PFS} -->{COMMENTS_FORM_PFS}<!-- ENDIF -->
              <!-- IF {COMMENTS_FORM_SFS} --><span class="spaced">{PHP.cfg.separator}</span>{COMMENTS_FORM_SFS}<!-- ENDIF -->
            </td>
          </tr>
          <tr>
            <td colspan="2" class="valid">
              <input type="submit" class="btn textleft" value="{COMMENTS_FORM_UPDATE_BUTTON}">
            </td>
          </tr>
        </table>
      </form>
<!-- END: COMMENTS_FORM_EDIT -->
<!-- END: MAIN -->
<!-- BEGIN: COMMENTS -->
    
    <a name="comments"></a>
    <div style="display:{COMMENTS_DISPLAY}">
<!-- BEGIN: COMMENTS_ROW -->
      <div class="row-fluid">
        <div class="span12 comment">
            <h4>Комментарии:</h4>
          <h5 class="marginbottom0"><span class="commentsdate">{COMMENTS_ROW_DATE}</span> - {COMMENTS_ROW_AUTHOR}</h5>
          <p class="em">{COMMENTS_ROW_TEXT}</p>
          <p class="blue">
              <a href="#" class="pull-left paddingright10">Ответить</a>
              <a href="#">Цитировать</a>
          </p>
          <span class="commentsdate">{COMMENTS_ROW_ADMIN}{COMMENTS_ROW_EDIT}</span>
        </div>
      </div>
      <hr />
<!-- END: COMMENTS_ROW -->
<!-- BEGIN: PAGNAVIGATOR -->
        <!-- IF {COMMENTS_PAGES_PAGNAV} -->
        <p class="paging">{COMMENTS_PAGES_PAGESPREV}{COMMENTS_PAGES_PAGNAV}{COMMENTS_PAGES_PAGESNEXT}</p>
        <p class="paging"><span>{COMMENTS_PAGES_INFO}</span></p>
        <!-- ENDIF -->
<!-- END: PAGNAVIGATOR -->
<!-- BEGIN: COMMENTS_NEWCOMMENT -->
        <h4>Оставьте комментарий:</h4>
        {FILE "{PHP.cfg.themes_dir}/{PHP.cfg.defaulttheme}/warnings.tpl"}
        <form action="{COMMENTS_FORM_SEND}" method="post" name="newcomment">
          <!-- BEGIN: GUEST -->
          <div>{PHP.L.Name}: {COMMENTS_FORM_AUTHOR}</div>
          <!-- END: GUEST -->
          <div>
            {COMMENTS_FORM_TEXT}
            <!-- IF {COMMENTS_FORM_PFS} -->{COMMENTS_FORM_PFS}<!-- ENDIF -->
            <!-- IF {COMMENTS_FORM_SFS} --><span class="spaced">{PHP.cfg.separator}</span>{COMMENTS_FORM_SFS}<!-- ENDIF -->
          </div>

          <!-- IF {PHP.usr.id} == 0 AND {COMMENTS_FORM_VERIFYIMG} -->
          <div>{COMMENTS_FORM_VERIFYIMG}: {COMMENTS_FORM_VERIFY}</div>
          <!-- ENDIF -->
          <div class="margintop10">
            <button type="submit" class="btn">{PHP.L.Submit}</button>
          </div>
        </form>
        <div class="help">{COMMENTS_FORM_HINT}</div>
<!-- END: COMMENTS_NEWCOMMENT -->
<!-- BEGIN: COMMENTS_EMPTY -->
        <div class="warning">{COMMENTS_EMPTYTEXT}</div>
<!-- END: COMMENTS_EMPTY -->
<!-- BEGIN: COMMENTS_CLOSED -->
        <div class="error">{COMMENTS_CLOSED}</div>
<!-- END: COMMENTS_CLOSED -->
    </div>
<!-- END: COMMENTS -->