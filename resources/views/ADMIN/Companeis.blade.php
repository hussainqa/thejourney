@extends('layouts.admin')
@section('content')
{{-- <form>
    <div class="mb-3">
      <label for="searchInput" class="form-label">Search</label>
      <input type="text" class="form-control" id="searchInput" placeholder="Enter company name or type">
    </div>
  </form> --}}
<table class="table" id="companiesTable">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">اسم الشركة</th>
        <th scope="col"> النوع </th>
        <th scope="col">اللوكو</th>
        <th scope="col">اعلان 1</th>
        <th scope="col">اعلان 2</th>
        <th scope="col">اعلان 3</th>
        <th scope="col">الداتا</th>

        <th scope="col">روابط الصفحة</th>

        <th scope="col">تغيير</th>
        <th scope="col">حذف</th>



      </tr>
    </thead>
    <tbody>
        @foreach ($companies as $company )
      <tr>
        <th scope="row">{{ $company->id }}</th>
        <td id="companyname">{{ $company->name }}</td>
        <td id="companytype">{{ $company->type }}</td>
        <td><img src="/storage/{{ $company->logo }}" alt="" style="width: 45px; height: 45px" class="rounded-circle" /></td>
        <td><img src="/storage/{{ $company->ad_1 }}" alt="" style="width: 45px; height: 45px" class="rounded-circle" /></td>
        <td><img src="/storage/{{ $company->ad_2 }}" alt="" style="width: 45px; height: 45px" class="rounded-circle" /></td>
        <td><img src="/storage/{{ $company->ad_3 }}" alt="" style="width: 45px; height: 45px" class="rounded-circle" /></td>
        <td><a href="{{ route('CompanyData', ['id' => $company->id]) }}">data</a></td>

        <td><button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#exampleModal-{{ $company->id }}">
            الروابط
          </button></td>
          <div class="modal fade" id="exampleModal-{{ $company->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">نسخ الروابط </h5>
                  <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" id="adlink_{{ $company->id }}" value="http://127.0.0.1:8000/theJourney/{{ $company->type }}/{{ $company->UrlName }}/advert/1" hidden>
                    <button onclick="copyAdLink({{ $company->id }})" class="btn btn-primary">نسخ الإعلان<i class="fas fa-copy"></i></button>

                    <input type="text" id="link_{{ $company->id }}" value="http://127.0.0.1:8000/theJourney/{{ $company->type }}/{{ $company->UrlName }}" hidden>
                    <button onclick="copyLink({{ $company->id }})" class="btn btn-primary">نسخ الرابط<i class="fas fa-copy"></i></button>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>



            <td>
          <a href="{{ route('EditCompany', ['id' => $company->id]) }}" ><i class="bi bi-pencil-square"></i></a>
            </td>
      <td>
             <a href="{{ route('Delete-Company', ['id' => $company->id]) }}" ><i class="bi bi-trash"></i></a>
      </td>
      </tr>
      @endforeach
    </tbody>
  </table>


@endsection

<script>


    function copyLink(id) {
      // Get the link from the input element
      var link = document.getElementById("link_"+id).value;

      // Create a temporary input element
      var temp = document.createElement("input");

      // Add the temporary input element to the document
      document.body.appendChild(temp);

      // Set the value of the temporary input element to the link
      temp.value = link;

      // Select the contents of the temporary input element
      temp.select();

      // Copy the contents of the temporary input element to the clipboard
      document.execCommand("copy");

      // Remove the temporary input element from the document
      document.body.removeChild(temp);

      // Display an alert to the user
      alert("Link copied to clipboard: " + link);
    }
    function copyAdLink(id) {
      // Get the link from the input element
      var link = document.getElementById("adlink_"+id).value;

      // Create a temporary input element
      var temp = document.createElement("input");

      // Add the temporary input element to the document
      document.body.appendChild(temp);

      // Set the value of the temporary input element to the link
      temp.value = link;

      // Select the contents of the temporary input element
      temp.select();

      // Copy the contents of the temporary input element to the clipboard
      document.execCommand("copy");

      // Remove the temporary input element from the document
      document.body.removeChild(temp);

      // Display an alert to the user
      alert("Link copied to clipboard: " + link);
    };

    window.onload = function() {
  const companiesTable = document.getElementById("companiesTable");
  const searchInput = document.querySelector("#searchInput");

  searchInput.addEventListener("input", () => {
    const searchValue = searchInput.value.toLowerCase();

    console.log(searchValue);
    const rows = companiesTable.querySelectorAll("tbody tr");
    rows.forEach(row => {
      const name = row.querySelector("#companyname").textContent.toLowerCase();
      const type = row.querySelector("#companytype").textContent.toLowerCase();
      if (name.includes(searchValue) || type.includes(searchValue)) {
        row.style.display = "";
      } else {
        row.style.display = "none";
      }
    });
  });
}



// document.addEventListener('DOMContentLoaded', function() {


//     const companyTable = document.getElementById("company-table");
// const searchInput = document.getElementById("search-btn");
// searchInput.addEventListener("input", function(event) {
//   const rows = companyTable.getElementsByTagName("tr");
// console.log("uisui");
//   for (let i = 0; i < rows.length; i++) {
//     const name = rows[i].querySelector("#companyname");
//     const type = rows[i].querySelector("#companytype");

//     if (
//       name.textContent.toLowerCase().includes(searchInput.value.toLowerCase()) &&
//       type.textContent.toLowerCase().includes(searchInput.value.toLowerCase())
//     ) {
//       rows[i].style.display = "";
//     } else {
//       rows[i].style.display = "none";
//     }
//   }
// });

// });

  </script>
