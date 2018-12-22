package smart.bus.ideology;

import android.app.Activity;
import android.bluetooth.BluetoothAdapter;
import android.bluetooth.BluetoothDevice;
import android.bluetooth.BluetoothSocket;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.os.AsyncTask;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.LinearLayout;
import android.widget.ListView;
import android.widget.TextView;
import android.widget.Toast;

import org.apache.http.HttpResponse;
import org.apache.http.NameValuePair;
import org.apache.http.client.HttpClient;
import org.apache.http.client.entity.UrlEncodedFormEntity;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.message.BasicNameValuePair;

import java.io.IOException;
import java.io.InputStream;
import java.io.OutputStream;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Calendar;
import java.util.Date;
import java.util.List;
import java.util.Random;
import java.util.Set;
import java.util.UUID;

public class Home extends AppCompatActivity {

    private static final int REQUEST_ENABLE_BT = 1;
    private static final Random strRecived = new Random();
    private final String UUID_STRING_WELL_KNOWN_SPP =
            "00001101-0000-1000-8000-00805F9B34FB";
    String myEmail, Temp1 = "", name, motion, temp, pulse, time;
    BluetoothAdapter bluetoothAdapter;
    int x = 0;
    String Temp = "";
    ArrayList<BluetoothDevice> pairedDeviceArrayList;
    ArrayList<String> deviceName;
    ListView listViewPairedDevice;
    EditText edName, edSeat, edStation;
    TextView tvAmount;
    int i3 = 0;
    ArrayAdapter<BluetoothDevice> pairedDeviceAdapter;
    ThreadConnectBTdevice myThreadConnectBTdevice;
    ThreadConnected myThreadConnected;
    private UUID myUUID;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home);

        listViewPairedDevice = (ListView) findViewById(R.id.pairedlist);


        edName = (EditText) findViewById(R.id.name);
        edSeat = (EditText) findViewById(R.id.seat);
        edStation = (EditText) findViewById(R.id.area);
        tvAmount = (TextView) findViewById(R.id.amount);

        Intent i = getIntent();
        myEmail = i.getStringExtra("Email");

        if (!getPackageManager().hasSystemFeature(PackageManager.FEATURE_BLUETOOTH)) {
            Toast.makeText(this,
                    "FEATURE_BLUETOOTH NOT support",
                    Toast.LENGTH_LONG).show();
            finish();
            return;
        }


        ((Button) findViewById(R.id.update)).setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                finish();
            }
        });
        //using the well-known SPP UUID
        myUUID = UUID.fromString(UUID_STRING_WELL_KNOWN_SPP);

        bluetoothAdapter = BluetoothAdapter.getDefaultAdapter();
        if (bluetoothAdapter == null) {
            Toast.makeText(this,
                    "Bluetooth is not supported on this hardware platform",
                    Toast.LENGTH_LONG).show();
            finish();
            return;
        }


        ((Button) findViewById(R.id.go)).setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Date c = Calendar.getInstance().getTime();
                System.out.println("Current time => " + c);

                SimpleDateFormat df = new SimpleDateFormat("dd-MMM-yyyy");
                String formattedDate = df.format(c);

                time=formattedDate;
                pulse = edStation.getText().toString();
                temp = edSeat.getText().toString();
                motion = edName.getText().toString();
                name = tvAmount.getText().toString();
                new Send().execute();
            }
        });
    }

    @Override
    protected void onStart() {
        super.onStart();

        //Turn ON BlueTooth if it is OFF
        if (!bluetoothAdapter.isEnabled()) {
            Intent enableIntent = new Intent(BluetoothAdapter.ACTION_REQUEST_ENABLE);
            startActivityForResult(enableIntent, REQUEST_ENABLE_BT);
        }

        setup();
    }

    private void setup() {
        Set<BluetoothDevice> pairedDevices = bluetoothAdapter.getBondedDevices();
        if (pairedDevices.size() > 0) {
            pairedDeviceArrayList = new ArrayList<BluetoothDevice>();
            deviceName = new ArrayList<String>();
            for (BluetoothDevice device : pairedDevices) {
                pairedDeviceArrayList.add(device);
                deviceName.add(device.getName());
            }

            pairedDeviceAdapter = new ArrayAdapter<BluetoothDevice>(this,
                    android.R.layout.simple_list_item_1, pairedDeviceArrayList);
            listViewPairedDevice.setAdapter(pairedDeviceAdapter);

            listViewPairedDevice.setOnItemClickListener(new AdapterView.OnItemClickListener() {

                @Override
                public void onItemClick(AdapterView<?> parent, View view,
                                        int position, long id) {
                    BluetoothDevice device =
                            (BluetoothDevice) parent.getItemAtPosition(position);
                    Toast.makeText(Home.this,

                            "Name: " + device.getName() + "\n"
                                    + "Address: " + device.getAddress() + "\n"
                                    + "BondState: " + device.getBondState() + "\n"
                                    + "BluetoothClass: " + device.getBluetoothClass() + "\n"
                                    + "Class: " + device.getClass(),
                            Toast.LENGTH_LONG).show();


                    myThreadConnectBTdevice = new ThreadConnectBTdevice(device);
                    myThreadConnectBTdevice.start();
                }
            });
        }
    }

    @Override
    protected void onDestroy() {
        super.onDestroy();

        if (myThreadConnectBTdevice != null) {
            myThreadConnectBTdevice.cancel();
        }
    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        if (requestCode == REQUEST_ENABLE_BT) {
            if (resultCode == Activity.RESULT_OK) {
                setup();
            } else {
                Toast.makeText(this,
                        "BlueTooth NOT enabled",
                        Toast.LENGTH_SHORT).show();
                finish();
            }
        }
    }

    //Called in ThreadConnectBTdevice once connect successed
    //to start ThreadConnected
    private void startThreadConnected(BluetoothSocket socket) {

        myThreadConnected = new ThreadConnected(socket);
        myThreadConnected.start();
    }

    private void showValue(final String msgReceived) {


        if (i3 > 1) {
            try {

                runOnUiThread(new Runnable() {

                    @Override
                    public void run() {


                        String[] userinfo = msgReceived.split(",");

                        try {


                            if (myEmail.equalsIgnoreCase(userinfo[0])) {
                                tvAmount.setText(myEmail);
                                edName.setText(userinfo[1]);
                                edSeat.setText(userinfo[2]);
                                edStation.setText(userinfo[3].substring(0, 2));

                            } else if (myEmail.equalsIgnoreCase(userinfo[4])) {
                                tvAmount.setText(myEmail);
                                edName.setText(userinfo[5]);
                                edSeat.setText(userinfo[6]);
                                edStation.setText(userinfo[7].substring(0, 2));
                            } else if (myEmail.equalsIgnoreCase(userinfo[8])) {
                                tvAmount.setText(myEmail);
                                edName.setText(userinfo[9]);
                                edSeat.setText(userinfo[10]);
                                edStation.setText(userinfo[11].substring(0, 2));

                            }

                            Log.e("msgReceived123", msgReceived);


                        } catch (Exception e) {
                            Log.e("ERROR 1", "" + e.toString());
                        }

                    }
                });
            } catch (Exception e) {
                Toast.makeText(this, "Erro " + e.toString(), Toast.LENGTH_LONG).show();
            }
            i3 = 0;
            Temp = "";
            Log.e("TEMP", Temp);
        } else {
            Temp = Temp + msgReceived;
            i3++;
            Log.e("TEMP", Temp);
        }


        Log.e("TEMP", Temp);


    }

    /*
    ThreadConnectBTdevice:
    Background Thread to handle BlueTooth connecting
    */
    private class ThreadConnectBTdevice extends Thread {

        private final BluetoothDevice bluetoothDevice;
        private BluetoothSocket bluetoothSocket = null;


        private ThreadConnectBTdevice(BluetoothDevice device) {
            bluetoothDevice = device;

            try {
                String stInfo = device.getName();

                bluetoothSocket = device.createRfcommSocketToServiceRecord(myUUID);

            } catch (IOException e) {
                // TODO Auto-generated catch block
                e.printStackTrace();
            }
        }

        @Override
        public void run() {
            boolean success = false;
            try {
                bluetoothSocket.connect();
                success = true;
            } catch (IOException e) {
                e.printStackTrace();

                final String eMessage = e.getMessage();
                runOnUiThread(new Runnable() {

                    @Override
                    public void run() {
                    }
                });

                try {
                    bluetoothSocket.close();
                } catch (IOException e1) {
                    // TODO Auto-generated catch block
                    e1.printStackTrace();
                }
            }

            if (success) {
                //connect successful
                final String msgconnected = "connect successful:\n"
                        + "BluetoothSocket: " + bluetoothSocket + "\n"
                        + "BluetoothDevice: " + bluetoothDevice;

                runOnUiThread(new Runnable() {

                    @Override
                    public void run() {


                        ((LinearLayout) findViewById(R.id.hideout)).setVisibility(View.GONE);


                    }
                });

                startThreadConnected(bluetoothSocket);
            } else {
                //fail
            }
        }

        public void cancel() {

            Toast.makeText(getApplicationContext(),
                    "close bluetoothSocket",
                    Toast.LENGTH_LONG).show();

            try {
                bluetoothSocket.close();
            } catch (IOException e) {
                // TODO Auto-generated catch block
                e.printStackTrace();
            }

        }

    }

    private class ThreadConnected extends Thread {
        private final BluetoothSocket connectedBluetoothSocket;
        private final InputStream connectedInputStream;
        private final OutputStream connectedOutputStream;

        public ThreadConnected(BluetoothSocket socket) {
            connectedBluetoothSocket = socket;
            InputStream in = null;
            OutputStream out = null;

            try {
                in = socket.getInputStream();
                out = socket.getOutputStream();
            } catch (IOException e) {
                // TODO Auto-generated catch block
                e.printStackTrace();
            }

            connectedInputStream = in;
            connectedOutputStream = out;
        }

        @Override
        public void run() {
            byte[] buffer = new byte[5024];
            int bytes;
            int i = 0;
            while (true) {
                try {
                    bytes = connectedInputStream.read(buffer);
                    String strReceived = new String(buffer, 0, bytes, "UTF-8");
                    final String msgReceived = strReceived;
                    Log.e("Result", "Coming From " + msgReceived);

                    Temp1 = Temp1 + msgReceived;

                    try {
                        String go = Temp1.substring(Temp1.indexOf(";") + 1);
                        showValue(go);
                        Log.e("LetsGo", go);
                        go = "";


                    } catch (Exception e) {

                    }


                } catch (IOException e) {
                    // TODO Auto-generated catch block
                    e.printStackTrace();

                    final String msgConnectionLost = "Connection lost:\n"
                            + e.getMessage();
                    runOnUiThread(new Runnable() {

                        @Override
                        public void run() {

                        }
                    });
                }
            }
        }

        public void write(byte[] buffer) {
            try {
                connectedOutputStream.write(buffer);
            } catch (IOException e) {
                // TODO Auto-generated catch block
                e.printStackTrace();
            }
        }

        public void cancel() {
            try {
                connectedBluetoothSocket.close();
            } catch (IOException e) {
                // TODO Auto-generated catch block
                e.printStackTrace();
            }
        }
    }

    class Send extends AsyncTask<String, Void, Long> {


        protected Long doInBackground(String... urls) {


            HttpClient httpclient = new DefaultHttpClient();
            HttpPost httppost = new HttpPost("http://tashfik.me/healthmon/save.php");

            try {
                // Add your data
                List<NameValuePair> nameValuePairs = new ArrayList<NameValuePair>(2);
                nameValuePairs.add(new BasicNameValuePair("name", name));
                nameValuePairs.add(new BasicNameValuePair("motion", motion));
                nameValuePairs.add(new BasicNameValuePair("temp", temp));
                nameValuePairs.add(new BasicNameValuePair("pulse", pulse));
                nameValuePairs.add(new BasicNameValuePair("time", time));
                httppost.setEntity(new UrlEncodedFormEntity(nameValuePairs));


                // Execute HTTP Post Request
                HttpResponse response = httpclient.execute(httppost);

            } catch (Exception e) {
                // TODO Auto-generated catch block
            }
            return null;

        }

        protected void onProgressUpdate(Integer... progress) {

        }

        protected void onPostExecute(Long result) {
            Toast.makeText(Home.this, "Sent !", Toast.LENGTH_SHORT).show();
        }
    }
}
