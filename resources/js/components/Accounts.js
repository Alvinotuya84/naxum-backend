import React,{useEffect,useRef,useState} from 'react';
import ReactDOM from 'react-dom';
import DataTable from 'datatables.net-dt';
import   'react-toastify/dist/ReactToastify.css';

import $ from 'jquery';
import { ToastContainer, toast } from 'react-toastify';


function Accounts({accounts}) {

   const[loading, setLoading]=useState(false)
    const accounts_table = useRef(null);

    useEffect(() => {
        $(accounts_table.current).DataTable({

          });
            $('.delete').click(function(){
                if(confirm("Are you sure you want to delete this contact?")){
                    setLoading(true)
                    $.ajax({
                        url: `/users/${$('#delete').attr('data-value')}`,
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        type: 'DELETE',

                    }).done(function(response){
                      setLoading(false)
                      alert("Account Deleted Succesfull")
                      window.location.reload()

                      console.log(response)
                    }).catch(function(error){
                        alert("An Error occcured during the deletion process please refresh the page and try again")

                      console.log(error.message)

                      setLoading(false)
                      window.location.reload()

                    })
                }


               })



        }, [])

    return (
        <div>

<table  ref={accounts_table} className="table table-striped table-bordered" style={{width:"100%"}}>



<thead>
    <tr>
        <th>Name</th>
        <th>Contact</th>
        <th>Email</th>
        <th>Edit</th>
        <th>Delete</th>



    </tr>
</thead>
<tbody>
    {
        JSON.parse(accounts).map((item) =>(
            <tr key={item.id}>
            <td>{item.user_name}</td>
            <td>{item?.contact_number}</td>
            <td>{item.email}</td>
            <td><a href={`/users/${item.id}/edit`} className="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-1.5 text-center mr-2 mb-2">Edit</a>
</td>
            <td><a  data-value={item.id} href='#' className="delete text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-1.5 text-center mr-2 mb-2">{loading?"Loading...":"Delete"}</a>
</td>


        </tr>)
        )
    }



</tbody>

</table>
<ToastContainer
position="top-right"
autoClose={2000}
hideProgressBar={false}
newestOnTop={false}
closeOnClick
rtl={false}
pauseOnFocusLoss
draggable
pauseOnHover
theme="light"
/>
        </div>


           );
}

export default Accounts;

if (document.getElementById('accounts')) {
    const element=document.getElementById("accounts")

    const props=Object.assign({}, element.dataset)
    ReactDOM.render(<Accounts {...props} />, document.getElementById('accounts'));
}
