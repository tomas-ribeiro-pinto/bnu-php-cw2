
function confirmDelete()
{
    if(confirm("Do you really want to delete the selected students?") == true)
    {
        document.getElementById("deleteForm").submit();
    }
}