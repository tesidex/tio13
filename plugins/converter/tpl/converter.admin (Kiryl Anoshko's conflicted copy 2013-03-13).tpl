<!-- BEGIN: MAIN -->
<b>(осторожно с users - лучше не удалять)</b>
<table>
        <form action="{PHP|cot_url('admin','m=other&p=converter')}" method="POST">
                <tr><td>
                                From:&nbsp;&nbsp;{SOURCE_DB_LIST}
                        </td></tr>
                <tr><td>
                                To:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{TARGET_DB_LIST}
                        </td></tr>
                <tr><td>
                                <input type="submit" name="button" value="begin">
                                <input type="submit" name="button" value="delete">
                        </td></tr>
        </form>
</table>

<!-- END: MAIN -->