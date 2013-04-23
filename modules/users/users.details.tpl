<!-- BEGIN: MAIN -->
    <div class="row-fluid">
      <div class="span12">
        <h2>{USERS_DETAILS_NAME}<!-- BEGIN: USERS_DETAILS_ADMIN --> &nbsp; [ {USERS_DETAILS_ADMIN_EDIT} ]<!-- END: USERS_DETAILS_ADMIN -->
          <!-- IF {USERS_DETAILS_ONLINE} == 1 -->
          <span class="label label-success pull-right">{PHP.L.blogster_online}</span>
        <!-- ELSE -->
          <span class="label pull-right">{PHP.L.blogster_offline}</span>
        <!-- ENDIF --></h2>
      </div>
      <div class="row-fluid">
        <div class="span2" style="margin-bottom: 15px;">
          {USERS_DETAILS_AVATAR}
        </div>
        <div class="span10">
          <table class="table table-striped">
          <!-- IF {PHP.cot_modules.pm} -->
            <!-- IF {PHP.usr.maingrp} > 0 -->
              <tr>
                <td>{PHP.L.users_sendpm}:</td>
                <td>{USERS_DETAILS_PM}</td>
              </tr>
            <!-- ENDIF -->
          <!-- ENDIF -->
          <tr>
            <td>{PHP.L.Country}:</td>
            <td>{USERS_DETAILS_COUNTRYFLAG} {USERS_DETAILS_COUNTRY}</td>
          </tr>
          <tr>
            <td class="width20">{PHP.L.Maingroup}:</td>
            <td class="width80">{USERS_DETAILS_MAINGRP}</td>
          </tr>
          <tr>
            <td>{PHP.L.Groupsmembership}:</td>
            <td>{PHP.L.Maingroup}:<br />&nbsp;{PHP.out.img_down}<br />{USERS_DETAILS_GROUPS}</td>
          </tr>
          <tr>
            <td>{PHP.L.Timezone}:</td>
            <td>{USERS_DETAILS_TIMEZONE}</td>
          </tr>
          <!-- IF {USERS_DETAILS_AGE} -->
          <tr>
            <td>{PHP.L.Age}:</td>
            <td>{USERS_DETAILS_AGE} <span class="muted">({USERS_DETAILS_BIRTHDATE})</span></td>
          </tr>
          <!-- ENDIF -->
          <!-- IF {USERS_DETAILS_GENDER} -->
          <tr>
            <td>{PHP.L.Gender}:</td>
            <td>{USERS_DETAILS_GENDER}</td>
          </tr>
          <!-- ENDIF -->
          <tr>
            <td>{PHP.L.Registered}:</td>
            <td>{USERS_DETAILS_REGDATE}</td>
          </tr>
          <tr>
            <td>{PHP.L.LastSeen}:</td>
            <td>{USERS_DETAILS_LASTLOG}</td>
          </tr>
          <tr>
            <td>{PHP.L.blogster_posts}:</td>
            <td>{USERS_DETAILS_POSTCOUNT}</td>
          </tr>
          </table>
        </div>
      </div>
      <div class="row-fluid">
        <div class="span12">
          <!-- IF {USERS_DETAILS_TEXT} -->
            <h4>{PHP.L.Signature}:</h4>
            <blockquote>
              <p>{USERS_DETAILS_TEXT}</p>
              <small>{USERS_DETAILS_NICKNAME}</small>
            </blockquote>
          <!-- ENDIF -->
        </div>
      </div>
    </div>
<!-- END: MAIN -->