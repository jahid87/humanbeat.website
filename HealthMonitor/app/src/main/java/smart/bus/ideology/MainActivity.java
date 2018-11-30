package smart.bus.ideology;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

public class MainActivity extends AppCompatActivity {

    EditText name,pass;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);


        name=(EditText)findViewById(R.id.email);
        pass=(EditText)findViewById(R.id.password);

        ((Button)findViewById(R.id.login)).setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {


                if(name.getText().toString().equalsIgnoreCase("A") &&  pass.getText().toString().equalsIgnoreCase("123")){
                  Intent i=  new Intent(MainActivity.this,Home.class);
                    i.putExtra("Email","A");
                  startActivity(i);
                }else if(name.getText().toString().equalsIgnoreCase("B") && pass.getText().toString().equalsIgnoreCase("123")){
                    Intent i=  new Intent(MainActivity.this,Home.class);
                    i.putExtra("Email","B");
                    startActivity(i);
                }else if(name.getText().toString().equalsIgnoreCase("C") && pass.getText().toString().equalsIgnoreCase("123")){
                    Intent i=  new Intent(MainActivity.this,Home.class);
                    i.putExtra("Email","C");
                    startActivity(i);
                }else if(name.getText().toString().equalsIgnoreCase("doctor@doctor.com") && pass.getText().toString().equalsIgnoreCase("123")){
                    Intent i=  new Intent(MainActivity.this,DoctorActivity.class);
                    startActivity(i);
                }else {
                    Toast.makeText(MainActivity.this, "Wrong credentials !", Toast.LENGTH_SHORT).show();
                }


            }
        });
    }
}
