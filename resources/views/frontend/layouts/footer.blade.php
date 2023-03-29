<div class="footer">
    <div class="inside-footer">
        <div class="container">
            <div class="row">
                <div class="details col-md-4">
                    <img src="{{URL::asset('frontend/imgs/logo.png')}}">
                    <h4>بنك الدم</h4>
                    <p>
                        هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى.
                    </p>
                </div>
                <div class="pages col-md-4">
                    <div class="list-group" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-action active" id="list-home-list" href="index" role="tab" aria-controls="home">الرئيسية</a>
                        <a class="list-group-item list-group-item-action" id="list-profile-list" href="about" role="tab" aria-controls="profile">عن بنك الدم</a>
                        <a class="list-group-item list-group-item-action" id="list-messages-list" href="{{ route('article.index') }}" role="tab" aria-controls="messages">المقالات</a>
                        <a class="list-group-item list-group-item-action" id="list-settings-list" href="{{ route('donation_requests.create') }}" role="tab" aria-controls="settings">طلبات التبرع</a>
                        <a class="list-group-item list-group-item-action" id="list-settings-list" href="{{ route('how_are.index') }}" role="tab" aria-controls="settings">من نحن</a>
                        <a class="list-group-item list-group-item-action" id="list-settings-list" href="{{ route('contacts_us.index') }}" role="tab" aria-controls="settings">اتصل بنا</a>
                    </div>
                </div>
                <div class="stores col-md-4">
                    <div class="availabe">
                        <p>متوفر على</p>
                        <a href="#">
                            <img src="{{URL::asset('frontend/imgs/Icon.png')}}">
                        </a>
                        <a href="#">
                            <img src="{{URL::asset('frontend/imgs/ios1.png')}}">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="other">
        <div class="container">
            <div class="row">
                <div class="social col-md-4">
                    <div class="icons">
                        <a href="https://www.facebook.com/abdelftah.mahmoud.73/" class="facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/body_mahmoud79/" class="instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="whatsapp"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
                <div class="rights col-md-8">
                    <p>جميع الحقوق محفوظة لـ <span>بنك الدم</span> &copy; 2023</p>
                </div>
            </div>
        </div>
    </div>
</div>
