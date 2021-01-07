@extends('layouts.app')
@section('content')
{{-- Primary book --}}
<div class="even">
    <div class="container" id="section1">
        <section class="hero is-fullheight">
            <div class="hero-body">
                <div class="columns">
                    <div class="level">
                                            
                        <div class="column">
                            <img class="image is-2by3 is-paddingless" src="https://i.pinimg.com/564x/a9/12/03/a912032ab0b755df1adeb73ffca51a0d.jpg" alt="">
                        </div>

                        <div class="column is-1"></div>

                        <div class="column">
                            <h1 class="title">Dolorem vero autem</h1>
                            <div class="text">
                                @php
                                    echo(
                                        nl2br(
                                            "
                                                Pariatur itaque repellat nihil ad distinctio officiis at laboriosam. Sunt optio amet ad et sit aperiam similique est. Amet tenetur voluptatibus itaque dolorem praesentium distinctio molestiae velit maxime. Vero quaerat suscipit mollitia voluptatum sint cupiditate expedita. Et non ullam et voluptatem aliquam debitis.
                                                Earum excepturi sapiente et cum necessitatibus pariatur. Et impedit eos in quo sapiente optio adipisci in sit. Doloremque voluptate velit incidunt doloremque minima autem blanditiis. Dolorem minus et esse eius quos. Eaque quam doloremque architecto fuga eaque et.
                                                Similique neque non blanditiis. Facere et amet aut placeat nemo. Vel nam dolor sint saepe esse nostrum voluptatem aspernatur. Nemo quisquam amet error quidem laboriosam amet.
                                                
                                                Delectus neque delectus dolore nemo sed. Perspiciatis sint est iure autem nesciunt. Laborum ullam velit quis aut recusandae eligendi exercitationem. Neque maiores eum doloribus enim aut consequatur sapiente. Et suscipit ea quia nulla repellendus eos sed perferendis. Nihil excepturi aut.
                                                Deserunt sint dolorum accusantium velit. Assumenda vitae laboriosam recusandae facilis vero aspernatur velit suscipit. Dolores animi quia aliquam sit. Officiis libero in eveniet distinctio. Voluptatem et quo animi repellendus rem et veritatis eveniet dicta.
                                                Praesentium vel sed ullam omnis consectetur nostrum voluptas et. Ullam cumque optio sed illum eligendi. Aut a nemo rerum sapiente ut corrupti ipsa optio sit. Tempora mollitia architecto distinctio suscipit aspernatur. Voluptatem adipisci non consectetur in enim numquam nostrum illum sit. Dignissimos autem eligendi et quam sed et iusto officiis culpa.
                                                    
                                                Delectus neque delectus dolore nemo sed. Perspiciatis sint est iure autem nesciunt. Laborum ullam velit quis aut recusandae eligendi exercitationem. Neque maiores eum doloribus enim aut consequatur sapiente. Et suscipit ea quia nulla repellendus eos sed perferendis. Nihil excepturi aut.
                                                Deserunt sint dolorum accusantium velit. Assumenda vitae laboriosam recusandae facilis vero aspernatur velit suscipit. Dolores animi quia aliquam sit. Officiis libero in eveniet distinctio. Voluptatem et quo animi repellendus rem et veritatis eveniet dicta.
                                                Praesentium vel sed ullam omnis consectetur nostrum voluptas et. Ullam cumque optio sed illum eligendi. Aut a nemo rerum sapiente ut corrupti ipsa optio sit. Tempora mollitia architecto distinctio suscipit aspernatur. Voluptatem adipisci non consectetur in enim numquam nostrum illum sit. Dignissimos autem eligendi et quam sed et iusto officiis culpa.
                                            "
                                        )
                                    )    
                                @endphp
                            </div>
                            <div class="button-wrap my-3">
                                <button class="button is-outlined is-primary">Lees de demo</button>
                                <button class="button is-outlined is-primary">Koop het hier</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-foot">
                
            </div>
        </section>
    </div>
</div>

{{-- Book list --}}
<div class="uneven">
    <div class="container" id="section1">
        <section class="hero is-fullheight">
            <div class="hero-body">
                <div class="container">
                    <div class="slider center">
                      <div class="clip"><h3><div class="top">top</div><div><img  class="image is-2by3 is-paddingless px-3" src="https://i.pinimg.com/564x/a9/12/03/a912032ab0b755df1adeb73ffca51a0d.jpg" alt=""></div><div class="bottom">btm</div></h3></div>
                      <div class="clip"><h3><div class="top">top</div><div><img  class="image is-2by3 is-paddingless px-3" src="https://i.pinimg.com/564x/a9/12/03/a912032ab0b755df1adeb73ffca51a0d.jpg" alt=""></div><div class="bottom">btm</div></h3></div>
                      <div class="clip"><h3><div class="top">top</div><div><img  class="image is-2by3 is-paddingless px-3" src="https://i.pinimg.com/564x/a9/12/03/a912032ab0b755df1adeb73ffca51a0d.jpg" alt=""></div><div class="bottom">btm</div></h3></div>
                      <div class="clip"><h3><div class="top">top</div><div><img  class="image is-2by3 is-paddingless px-3" src="https://i.pinimg.com/564x/a9/12/03/a912032ab0b755df1adeb73ffca51a0d.jpg" alt=""></div><div class="bottom">btm</div></h3></div>
                      <div class="clip"><h3><div class="top">top</div><div><img  class="image is-2by3 is-paddingless px-3" src="https://i.pinimg.com/564x/a9/12/03/a912032ab0b755df1adeb73ffca51a0d.jpg" alt=""></div><div class="bottom">btm</div></h3></div>
                      <div class="clip"><h3><div class="top">top</div><div><img  class="image is-2by3 is-paddingless px-3" src="https://i.pinimg.com/564x/a9/12/03/a912032ab0b755df1adeb73ffca51a0d.jpg" alt=""></div><div class="bottom">btm</div></h3></div>
                    </div>
                  </div>
            </div>
            <div class="hero-foot">
                
            </div>
        </section>
    </div>
</div>

{{-- About me --}}
<div class="even">
    <div class="container" id="section1">
        <section class="hero is-fullheight">
            <div class="hero-body">
                <div class="columns">
                    <div class="level">
                                            
                        <div class="column">
                            <img class="image is-2by3 is-paddingless" src="https://i.pinimg.com/564x/a9/12/03/a912032ab0b755df1adeb73ffca51a0d.jpg" alt="">
                        </div>

                        <div class="column is-1"></div>

                        <div class="column">
                            <h1 class="title">Dolorem vero autem</h1>
                            <div class="text">
                                @php
                                    echo(
                                        nl2br(
                                            "
                                                Pariatur itaque repellat nihil ad distinctio officiis at laboriosam. Sunt optio amet ad et sit aperiam similique est. Amet tenetur voluptatibus itaque dolorem praesentium distinctio molestiae velit maxime. Vero quaerat suscipit mollitia voluptatum sint cupiditate expedita. Et non ullam et voluptatem aliquam debitis.
                                                Earum excepturi sapiente et cum necessitatibus pariatur. Et impedit eos in quo sapiente optio adipisci in sit. Doloremque voluptate velit incidunt doloremque minima autem blanditiis. Dolorem minus et esse eius quos. Eaque quam doloremque architecto fuga eaque et.
                                                Similique neque non blanditiis. Facere et amet aut placeat nemo. Vel nam dolor sint saepe esse nostrum voluptatem aspernatur. Nemo quisquam amet error quidem laboriosam amet.
                                                
                                                Delectus neque delectus dolore nemo sed. Perspiciatis sint est iure autem nesciunt. Laborum ullam velit quis aut recusandae eligendi exercitationem. Neque maiores eum doloribus enim aut consequatur sapiente. Et suscipit ea quia nulla repellendus eos sed perferendis. Nihil excepturi aut.
                                                Deserunt sint dolorum accusantium velit. Assumenda vitae laboriosam recusandae facilis vero aspernatur velit suscipit. Dolores animi quia aliquam sit. Officiis libero in eveniet distinctio. Voluptatem et quo animi repellendus rem et veritatis eveniet dicta.
                                                Praesentium vel sed ullam omnis consectetur nostrum voluptas et. Ullam cumque optio sed illum eligendi. Aut a nemo rerum sapiente ut corrupti ipsa optio sit. Tempora mollitia architecto distinctio suscipit aspernatur. Voluptatem adipisci non consectetur in enim numquam nostrum illum sit. Dignissimos autem eligendi et quam sed et iusto officiis culpa.
                                                    
                                                Delectus neque delectus dolore nemo sed. Perspiciatis sint est iure autem nesciunt. Laborum ullam velit quis aut recusandae eligendi exercitationem. Neque maiores eum doloribus enim aut consequatur sapiente. Et suscipit ea quia nulla repellendus eos sed perferendis. Nihil excepturi aut.
                                                Deserunt sint dolorum accusantium velit. Assumenda vitae laboriosam recusandae facilis vero aspernatur velit suscipit. Dolores animi quia aliquam sit. Officiis libero in eveniet distinctio. Voluptatem et quo animi repellendus rem et veritatis eveniet dicta.
                                                Praesentium vel sed ullam omnis consectetur nostrum voluptas et. Ullam cumque optio sed illum eligendi. Aut a nemo rerum sapiente ut corrupti ipsa optio sit. Tempora mollitia architecto distinctio suscipit aspernatur. Voluptatem adipisci non consectetur in enim numquam nostrum illum sit. Dignissimos autem eligendi et quam sed et iusto officiis culpa.
                                            "
                                        )
                                    )    
                                @endphp
                            </div>
                            <div class="button-wrap my-3">
                                <button class="button is-outlined is-primary">Lees de demo</button>
                                <button class="button is-outlined is-primary">Koop het hier</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-foot">
                
            </div>
        </section>
    </div>
</div>

{{-- Contact --}}
<div class="uneven">
    <div class="container" id="section1">
        <section class="hero is-fullheight">
            <div class="hero-body">
                <div class="columns">
                    <div class="level">
                                            
                        <div class="column">
                            <form action="">
                                <label for="text" class="label is-full-width">Naam</label>
                                    <input type="text" class="input">
                                <label for="text" class="label mt-2">Email</label>
                                    <input type="text" class="input">
                                <label for="text" class="label mt-2">Uw bericht</label>
                                    <textarea class="textarea" name="" id="" cols="30" rows="5"></textarea>
                                <button class="button is-outlined is-primary is-fullwidth mt-4">Verstuur uw bericht</button>
                            </form>                        </div>

                        <div class="column is-1"></div>

                        <div class="column">
                            <h1 class="title">Dolorem vero autem</h1>
                            <div class="text">
                                @php
                                echo(
                                    nl2br(
                                        "
                                            Pariatur itaque repellat nihil ad distinctio officiis at laboriosam. Sunt optio amet ad et sit aperiam similique est. Amet tenetur voluptatibus itaque dolorem praesentium distinctio molestiae velit maxime. Vero quaerat suscipit mollitia voluptatum sint cupiditate expedita. Et non ullam et voluptatem aliquam debitis.
                                            Earum excepturi sapiente et cum necessitatibus pariatur. Et impedit eos in quo sapiente optio adipisci in sit. Doloremque voluptate velit incidunt doloremque minima autem blanditiis. Dolorem minus et esse eius quos. Eaque quam doloremque architecto fuga eaque et.
                                            Similique neque non blanditiis. Facere et amet aut placeat nemo. Vel nam dolor sint saepe esse nostrum voluptatem aspernatur. Nemo quisquam amet error quidem laboriosam amet.
                                        "
                                    )
                                )    
                            @endphp
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-foot">
                <footer class="footer level">
                    <div class="level-left"></div>
                    <div class="level-right">
                        <a href="#"><span class="icon"><i class="fab fa-facebook-f"></i></span></a>
                        <a href="#"><span class="icon"><i class="far fa-envelope"></i></i></span></a>
                    </div>
                </footer>
            </div>
        </section>
    </div>
</div>
@endsection