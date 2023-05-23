// Variables
// --Calendars
const days = ['Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa', 'Su'];
const months = ['January', 'February', 'March', "April", 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
var CurrentMonth = 5;

// Functions
// --Show/Hide password
function ShowPass() {
    var x = document.getElementById("SignUp_Pass_Input");

    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }

}

// --Create Calendar
function CalendarCreate() {
    

    // <div class="month">
    //         <ul class="calendar">
    //             <li class="prev">&#10094;</li>
    //             <li class="next">&#10095;</li>
    //             <li>August<br><span style="font-size:18px">2021</span></li>
    //         </ul>
    //     </div>

    //     <ul class="weekdays calendar">
    //         <li>Mo</li>
    //         <li>Tu</li>
    //         <li>We</li>
    //         <li>Th</li>
    //         <li>Fr</li>
    //         <li>Sa</li>
    //         <li>Su</li>
    //     </ul>

    //     <ul class="days calendar">
    //         <li>1</li>
    //         <li>2</li>
    //         <li>3</li>
    //         <li>4</li>
    //         <li>5</li>
    //         <li>6</li>
    //         <li>7</li>
    //         <li>8</li>
    //         <li>9</li>
    //         <li><span class="active">10</span></li>

    //         <li>12</li>
    //         <li>13</li>
    //         <li>14</li>
    //         <li>15</li>
    //         <li>16</li>
    //         <li>17</li>
    //         <li>18</li>
    //         <li>19</li>
    //         <li>20</li>
    //         <li>21</li>
    //         <li>22</li>
    //         <li>23</li>

    //         <li>24</li>
    //         <li>25</li>
    //         <li>26</li>
    //         <li>27</li>
    //         <li>28</li>
    //         <li>29</li>
    //         <li>30</li>
    //         <li>31</li>

    //     </ul>
}