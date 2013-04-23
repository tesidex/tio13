<!-- BEGIN: MAIN -->
    <h4 class="headingright">{PHP.L.blogster_recentpages}</h4>
    <table class="table table-striped">
      <tbody>
        <!-- BEGIN: PAGE_ROW -->
        <tr>
          <td class="centered" style="vertical-align: middle; width: 15%;">
            {PAGE_ROW_FILE_ICON}
          </td>
          <td>
            <h5>
              <a href="{PAGE_ROW_URL}">{PAGE_ROW_SHORTTITLE}</a>
            </h5>
            <small>{PAGE_ROW_DATE_STAMP|cot_date('M jS Y', $this)} {PHP.L.blogster_in} {PAGE_ROW_CATPATH}</small>
          </td>
        </tr>
        <!-- END: PAGE_ROW -->
      </tbody>
      <!-- BEGIN: NO_PAGES_FOUND -->
      <tr>
        <td class="centered">{PHP.L.recentitems_nonewpages}</td>
      </tr>
      <!-- END: NO_PAGES_FOUND -->
    </table>
<!-- END: MAIN -->